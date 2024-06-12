<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Region;
use App\Models\Area;
use App\Models\Work;
use App\Models\ClientType;
use App\Models\WhomMeet;
use App\Models\Feedback;
use App\Models\User;
use App\Models\StudentInfo;

use Illuminate\Support\Facades\Hash;

use Auth;

require_once app_path('Helper/image.php');

class CMSController extends Controller
{
    public function addWork()
    {
        return view('backend.work.show',[
            'region' => Region::where('status','1')->with('areas')->get(),
            'client_type' => ClientType::where('status','1')->get(),
            'whom_meet' => WhomMeet::where('status','1')->get(),
            'feedback' => Feedback::where('status','1')->get()
        ]);
    }
    public function saveWork(Request $request)
    {
        $work = new Work();
        $work->employee_id = $request->employee_id;
        $work->en_visit_date = $request->en_visit_date;
        $work->region_id = $request->region_id;
        $work->area_id = $request->area_id;
        $work->client_type_id = $request->client_type_id;
        $work->meeting_person_id = $request->meeting_person_id;
        $work->en_client_name = $request->en_client_name;
        $work->en_client_phone = $request->en_client_phone;
        $work->en_client_address = $request->en_client_address;
        $work->feedback_id = $request->feedback_id;
        $work->document = document_upload($request->document);
        $work->save();
        return redirect(route('admin.manage_work'))->with('message', 'Successfully Added!');
    }
    public function manageWork()
    {
        $user = Auth::user();

        if ($user->role == 2) {
            // Admin: Fetch all data
            $work = Work::orderBy('id', 'desc')->get();
        } else {
            // Employee: Fetch only data related to the logged-in employee
            $work = Work::where('employee_id', $user->id)->orderBy('id', 'desc')->get();
        }

        return view('backend.work.index', [
            'work' => $work
        ]);
    }
    public function editWork($id)
    {
        $work = Work::find($id);

        return view('backend.work.edit',[
            'work' => $work,
            'region' => Region::where('status','1')->get(),
            'client_type' => ClientType::where('status','1')->get(),
            'whom_meet' => WhomMeet::where('status','1')->get(),
            'feedback' => Feedback::where('status','1')->get()
        ]);
    }
    public function updateWork(Request $request)
    {
        $work               = Work::find($request->work_id);
        $work->en_visit_date = $request->en_visit_date;
        $work->region_id = $request->region_id;
        $work->area_id = $request->area_id;
        $work->client_type_id = $request->client_type_id;
        $work->meeting_person_id = $request->meeting_person_id;
        $work->en_client_name = $request->en_client_name;
        $work->en_client_phone = $request->en_client_phone;
        $work->en_client_address = $request->en_client_address;
        $work->feedback_id = $request->feedback_id;
        if ($request->file('document')) {
            if (isset($work)) {
                delete_image($work->document);
                $work->delete();
            }
            $work->document = document_upload($request->document);
        }
        $work->save();
        return redirect(route('admin.manage_work'))->with('message', 'Successfully Updated!');
    }

    public function deleteWork(Request $request)
    {
        $work = Work::find($request->work_id);
        if (isset($work)) {
            delete_image($work->document);
            $work->delete();
        }
        $work->delete();

        return redirect()->route('admin.manage_work')->with('message', 'Successfully Deleted!');
    }

    public function viewWork($id)
    {
        $work_details = Work::where('id', $id)->first();

        return view('backend.work.details', [
            'work_details' => $work_details
        ]);
    }

    public function addRegion()
    {
        return view('backend.admin.region.show');
    }
    public function saveRegion(Request $request)
    {
        $region = new Region();
        $region->en_title = $request->en_title;
        $region->status = $request->status;
        $region->save();
        return redirect(route('admin.manage_region'))->with('message', 'Successfully Added!');
    }
    public function manageRegion()
    {
        return view('backend.admin.region.index', [
            'region' => Region::get(),
        ]);
    }
    public function editRegion($id)
    {
        $region = Region::find($id);

        return view('backend.admin.region.edit',[
            'region' => $region
        ]);
    }
    public function updateRegion(Request $request)
    {
        $region               = Region::find($request->region_id);
        $region->en_title = $request->en_title;
        $region->status = $request->status;
        $region->save();
        return redirect(route('admin.manage_region'))->with('message', 'Successfully Updated!');
    }

    public function deleteRegion(Request $request)
    {
        $region = Region::find($request->region_id);
        $region->delete();

        return redirect()->route('admin.manage_region')->with('message', 'Successfully Deleted!');
    }

    public function addArea()
    {
        return view('backend.admin.area.show',[
            'region' => Region::where('status','1')->get()
        ]);
    }
    public function saveArea(Request $request)
    {
        $area = new Area();
        $area->region_id = $request->region_id;
        $area->en_title = $request->en_title;
        $area->status = $request->status;
        $area->save();
        return redirect(route('admin.manage_area'))->with('message', 'Successfully Added!');
    }
    public function manageArea()
    {
        return view('backend.admin.area.index', [
            'area' => Area::where('status','1')->orderBy('id','desc')->get(),
        ]);
    }
    public function editArea($id)
    {
        $area = Area::find($id);

        return view('backend.admin.area.edit',[
            'region' => Region::where('status','1')->get(),
            'area' => $area
        ]);
    }
    public function updateArea(Request $request)
    {
        $area               = Area::find($request->area_id);
        $area->region_id = $request->region_id;
        $area->en_title = $request->en_title;
        $area->status = $request->status;
        $area->save();
        return redirect(route('admin.manage_area'))->with('message', 'Successfully Updated!');
    }

    public function deleteArea(Request $request)
    {
        $area = Area::find($request->area_id);
        $area->delete();

        return redirect()->route('admin.manage_area')->with('message', 'Successfully Deleted!');
    }

    public function fetchArea(Request $request){
        $data['areas'] = Area::where("region_id", $request->region_id)
            ->orderBy('en_title', 'asc') // Sorting in ascending order
            ->get(["en_title", "id"]);

        return response()->json($data);
    }

    public function addClientType()
    {
        return view('backend.admin.client-type.show');
    }
    public function saveClientType(Request $request)
    {
        $client_type = new ClientType();
        $client_type->en_title = $request->en_title;
        $client_type->status = $request->status;
        $client_type->save();
        return redirect(route('admin.manage_client_type'))->with('message', 'Successfully Added!');
    }
    public function manageClientType()
    {
        return view('backend.admin.client-type.index', [
            'client_type' => ClientType::get(),
        ]);
    }
    public function editClientType($id)
    {
        $client_type = ClientType::find($id);

        return view('backend.admin.client-type.edit',[
            'client_type' => $client_type
        ]);
    }
    public function updateClientType(Request $request)
    {
        $client_type               = ClientType::find($request->client_type_id);
        $client_type->en_title = $request->en_title;
        $client_type->status = $request->status;
        $client_type->save();
        return redirect(route('admin.manage_client_type'))->with('message', 'Successfully Updated!');
    }

    public function deleteClientType(Request $request)
    {
        $client_type = ClientType::find($request->client_type_id);
        $client_type->delete();

        return redirect()->route('admin.manage_client_type')->with('message', 'Successfully Deleted!');
    }
    public function addWhomMeet()
    {
        return view('backend.admin.whom-meet.show');
    }
    public function saveWhomMeet(Request $request)
    {
        $whom_meet = new WhomMeet();
        $whom_meet->en_title = $request->en_title;
        $whom_meet->status = $request->status;
        $whom_meet->save();
        return redirect(route('admin.manage_whom_meet'))->with('message', 'Successfully Added!');
    }
    public function manageWhomMeet()
    {
        return view('backend.admin.whom-meet.index', [
            'whom_meet' => WhomMeet::get(),
        ]);
    }
    public function editWhomMeet($id)
    {
        $whom_meet = WhomMeet::find($id);

        return view('backend.admin.whom-meet.edit',[
            'whom_meet' => $whom_meet
        ]);
    }
    public function updateWhomMeet(Request $request)
    {
        $whom_meet               = WhomMeet::find($request->whom_meet_id);
        $whom_meet->en_title = $request->en_title;
        $whom_meet->status = $request->status;
        $whom_meet->save();
        return redirect(route('admin.manage_whom_meet'))->with('message', 'Successfully Updated!');
    }

    public function deleteWhomMeet(Request $request)
    {
        $whom_meet = WhomMeet::find($request->whom_meet_id);
        $whom_meet->delete();

        return redirect()->route('admin.manage_whom_meet')->with('message', 'Successfully Deleted!');
    }
    public function addFeedback()
    {
        return view('backend.admin.feedback.show');
    }
    public function saveFeedback(Request $request)
    {
        $feedback = new Feedback();
        $feedback->en_title = $request->en_title;
        $feedback->status = $request->status;
        $feedback->save();
        return redirect(route('admin.manage_feedback'))->with('message', 'Successfully Added!');
    }
    public function manageFeedback()
    {
        return view('backend.admin.feedback.index', [
            'feedback' => Feedback::get(),
        ]);
    }
    public function editFeedback($id)
    {
        $feedback = Feedback::find($id);

        return view('backend.admin.feedback.edit',[
            'feedback' => $feedback
        ]);
    }
    public function updateFeedback(Request $request)
    {
        $feedback               = Feedback::find($request->feedback_id);
        $feedback->en_title = $request->en_title;
        $feedback->status = $request->status;
        $feedback->save();
        return redirect(route('admin.manage_feedback'))->with('message', 'Successfully Updated!');
    }

    public function deleteFeedback(Request $request)
    {
        $feedback = Feedback::find($request->feedback_id);
        $feedback->delete();

        return redirect()->route('admin.manage_feedback')->with('message', 'Successfully Deleted!');
    }

    public function updateUserName(Request $request)
    {
        $user_info               = User::find($request->id);
        $user_info->name = $request->name;
        $user_info->save();
        return redirect(route('admin.profile_admin'))->with('message', 'User Full Name Successfully Updated!');
    }
    public function updateUserPhone(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|unique:users,phone',
        ]);
        
        $user_info               = User::find($request->id);
        $user_info->phone = $request->phone;
        $user_info->save();
        return redirect(route('admin.profile_admin'))->with('message', 'User Phone Successfully Updated!');
    }

    public function updateUserEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|string|unique:users,email',
        ]);
        
        $user_info               = User::find($request->id);
        $user_info->email = $request->email;
        $user_info->save();
        return redirect(route('admin.profile_admin'))->with('message', 'User Email Successfully Updated!');
    }

    public function updateUserUsername(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users,username',
        ]);
        
        $user_info               = User::find($request->id);
        $user_info->username = $request->username;
        $user_info->save();
        return redirect(route('admin.profile_admin'))->with('message', 'User Username Successfully Updated!');
    }

    public function updateUserPhoto(Request $request)
    {
        $user_info               = User::find($request->id);
        if ($request->file('profile_photo_path')) {
            if (isset($user_info)) {
                delete_image($user_info->profile_photo_path);
                $user_info->delete();
            }
            $user_info->profile_photo_path = image_upload($request->profile_photo_path);
        }
        $user_info->save();
        return redirect(route('admin.profile_admin'))->with('message', 'Profile Photo Successfully Updated!');
    }

    public function updateUserPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed', // Ensure password and password_confirmation match
        ]);

        $user_info = User::find($request->id);
        $user_info->password = Hash::make($request->password);
        $user_info->save();

        return redirect(route('admin.profile_admin'))->with('message', 'Password successfully updated!');
    }

    public function saveInfo(Request $request)
    {
        $info = new StudentInfo();
        $info->name = $request->name;
        $info->polytechnic_name = $request->polytechnic_name;
        $info->blood_group = $request->blood_group;
        $info->email = $request->email;
        $info->number = $request->number;
        $info->document = image_upload($request->document);
        $info->save();
        return redirect()->back()->with('message', 'Information Successfully Added!');
    }

}
