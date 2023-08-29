@extends('layouts.admin')
@section('title')
    Product List
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
                            <h3 class="mb-0 bc-title"><b>All Products</b></h3>
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
                                        <th>Image</th>
                                        <th width="30%">Name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($products as $product)
                                        <tr id="product-bulk-delete">
                                            <td>
                                                <img src="{{ asset('storage') }}/{{ $product->featured_image }}"
                                                    alt="Image Not Found">
                                            </td>
                                            <td>
                                                {{ $product->name }}
                                            </td>
                                            <td>
                                                {{ $product->current_price }}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-success btn-sm  dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Publish
                                                    </button>
                                                    <div class="dropdown-menu animated--fade-in"
                                                        aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.product.change.status', ['id' => $product->id]) }}">Publish</a>
                                                        <a class="dropdown-item active"
                                                            href="{{ route('admin.product.change.status', ['id' => $product->id]) }}">Unpublish</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary btn-sm  dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Options
                                                    </button>
                                                    <div class="dropdown-menu animated--fade-in"
                                                        aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item"
                                                            href="https://geniusdevs.com/codecanyon/omnimart40/admin/affiliate/592/edit"><i
                                                                class="fas fa-angle-double-right"></i> Edit</a>
                                                        <a class="dropdown-item" target="_blank"
                                                            href="https://geniusdevs.com/codecanyon/omnimart40/product/Men-Polo-t-shirt"><i
                                                                class="fas fa-angle-double-right"></i> View</a>
                                                        <a class="dropdown-item"
                                                            href="https://geniusdevs.com/codecanyon/omnimart40/admin/item/galleries/592"><i
                                                                class="fas fa-angle-double-right"></i> Gallery Images</a>
                                                        <a class="dropdown-item"
                                                            href="https://geniusdevs.com/codecanyon/omnimart40/admin/item/highlight/592"><i
                                                                class="fas fa-angle-double-right"></i> Highlight</a>
                                                        <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#confirm-delete" href="javascript:;"
                                                            data-href="{{ route('admin.product.delete', ['id' => $product->id]) }}"><i
                                                                class="fas fa-angle-double-right"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <!-- End of Main Content -->
                                            <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog"
                                                aria-labelledby="confirm-deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Confirm Delete?
                                                            </h5>
                                                            <button class="close" type="button" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>

                                                        <!-- Modal Body -->
                                                        <div class="modal-body">
                                                            You are going to delete this item. All contents related with
                                                            this item will be lost. Do you want to
                                                            delete it?
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <form
                                                                action="{{ route('admin.product.delete', ['id' => $product->id]) }}"
                                                                class="d-inline btn-ok" method="POST">
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
