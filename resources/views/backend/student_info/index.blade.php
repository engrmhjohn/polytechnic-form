@extends('backend.master')
@section('title')
    CMS :: Student Record
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Manage Student Record</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Polytechnic Name</th>
                                    <th>Whatsapp No</th>
                                    <th>Blood Group</th>
                                    <th>Email</th>
                                    {{-- <th class="text-center">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($info as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name ?? ''}}</td>
                                        <td>
                                            <img src="{{ asset($item->document) }}" style="max-width: 150px;" alt="Student Picture">
                                        </td>
                                        <td>{{ $item->polytechnic_name ?? '' }}</td>
                                        <td>{{ $item->number ?? ''}}</td>
                                        <td>{{ $item->blood_group ?? ''}}</td>
                                        <td>{{ $item->email ?? ''}}</td>

                                        {{-- <td name="bstable-actions">
                                            <div class="btn-list d-flex justify-content-center" style="gap: 10px;">
                                                <a href="{{ route('admin.view_work', $item->id) }}"><button
                                                    class="btn btn-success btn-sm" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Preview"><span class="fe fe-eye fs-14"></span>
                                                </button></a>
                                                <a href="{{ route('admin.edit_work', $item->id) }}"><button
                                                        class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Edit"><span class="fe fe-edit fs-14"></span>
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
    <!-- End Row -->
@endsection
