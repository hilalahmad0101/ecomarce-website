@extends('layouts.admin')
@section('title')
    Service List
@endsection
@section('content')
    <div class="content">
        <div class="page-inner">

            <!-- Start of Main Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class=" mb-0"><b>Services</b></h3>
                            <a class="btn btn-primary  btn-sm"
                                href="{{ route('admin.service.create') }}"><i
                                    class="fas fa-plus"></i> Add</a>
                        </div>
                    </div>
                </div>

                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="gd-responsive-table">
                            <table class="table table-bordered table-striped" id="admin-table" width="100%"
                                cellspacing="0">

                                <thead>
                                    <tr>
                                        <th width="20%">Image</th>
                                        <th width="20%">Title</th>
                                        <th width="15%">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage') }}/{{ $service->image }}"
                                                    alt="Image Not Found">
                                            </td>
                                            <td>
                                                {{ $service->title }}
                                            </td>

                                            <td>
                                                <div class="action-list">
                                                    <a class="btn btn-secondary btn-sm "
                                                        href="{{ route('admin.service.edit', ['id' => $service->id]) }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm " data-toggle="modal"
                                                        data-target="#confirm-delete" href="javascript:;"
                                                        data-href="{{ route('admin.service.delete', ['id' => $service->id]) }}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- End of Main Content -->



        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        You are going to delete this service. All contents related with this service will be lost. Do you
                        want to delete it?
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form action="" class="d-inline btn-ok" method="get">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>



    </div>
    </div>
    </div>
@endsection
