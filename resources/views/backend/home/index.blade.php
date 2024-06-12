@extends('backend.master')
@section('title')
    Admin :: Home
@endsection
@section('content')
    @php
        //total admin
        $total_super_admin = App\Models\User::where('role', '2')->get();
        $total_super_admin_count = $total_super_admin->count();

        //total employee
        $total_employee = App\Models\User::where('role', '1')->get();
        $total_employee_count = $total_employee->count();

        //total pending employee
        $total_pending_employee = App\Models\User::where('role', '0')->get();
        $total_pending_employee_count = $total_pending_employee->count();

        //total contact
        $total_contact = App\Models\ContactUs::get();
        $total_contact_count = $total_contact->count();

        //recent work show for admin
        $student_info = App\Models\StudentInfo::take('10')->orderBy('id', 'desc')->get();
    @endphp
    @if (Auth::user()->role == '2')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Information Added by Students</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Polytechnic Name</th>
                                        <th>Image</th>
                                        {{-- <th class="text-center">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($student_info as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name ?? ''}}</td>
                                            <td>{{ $item->polytechnic_name ?? '' }}</td>
                                            <td>
                                                <img src="{{ asset($item->document) }}" style="max-width: 150px;" alt="Student Picture">
                                            </td>
                                            {{-- <td name="bstable-actions">
                                                <div class="btn-list d-flex justify-content-center" style="gap: 10px;">
                                                    <a href="{{ route('admin.view_work', $item->id) }}"><button
                                                            class="btn btn-success btn-sm" data-bs-toggle="tooltip"
                                                            data-bs-original-title="Preview"><span
                                                                class="fe fe-eye fs-14"></span>
                                                        </button></a>
                                                    <a href="{{ route('admin.edit_work', $item->id) }}"><button
                                                            class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                                            data-bs-original-title="Edit"><span
                                                                class="fe fe-edit fs-14"></span>
                                                        </button></a>
                                                    <form action="{{ route('admin.delete_work') }}" method="post"
                                                        id="delete">
                                                        @csrf
                                                        <input type="hidden" name="work_id" value="{{ $item->id }}">
                                                        <button class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure?');" type="submit"
                                                            data-bs-toggle="tooltip" data-bs-original-title="Delete"> <span
                                                                class="fe fe-trash-2"> </span></button>
                                                    </form>
                                                </div>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <p>Hii <strong>{{ Auth::user()->name }}, </strong>you're requesting to be Admin / Employee
                            privellage, it's need existing admin's approval. Please wait for confirmation. </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
