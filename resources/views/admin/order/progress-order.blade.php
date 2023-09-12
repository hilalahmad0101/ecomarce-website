@extends('layouts.admin')
@section('title')
    Progress Order
@endsection
@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class=" mb-0 bc-title"><b>Progress Orders</b></h3>
                            <div class="right">
                                <a href="https://geniusdevs.com/codecanyon/omnimart40/admin/order/csv/export"
                                    class="btn btn-info btn-sm d-inline-block">CSV Export</a>
                                <form class="d-inline-block"
                                    action="https://geniusdevs.com/codecanyon/omnimart40/admin/bulk/deletes" method="get">
                                    <input type="hidden" value="" name="ids[]" id="bulk_delete">
                                    <input type="hidden" value="orders" name="table">
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-body">

                        <form action="https://geniusdevs.com/codecanyon/omnimart40/admin/orders" method="GET">
                            <div class="row mb-4 justify-content-center">
                                <div class="col-md-6 col-sm-6 col-lg-4">
                                    <div class="form-group p-0">
                                        <label for="start_date">Start Date *</label>
                                        <input type="text" name="start_date" id="datepicker"
                                            class="form-control datepicker" id="start_date" placeholder="Start Date"
                                            value="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-4">
                                    <div class="form-group  p-0">
                                        <label for="end_date">End Date *</label>
                                        <input type="text" name="end_date" id="datepicker1"
                                            class="form-control datepicker" id="end_date" placeholder="End Date"
                                            value="">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center mt-3">
                                    <button class="btn btn-success py-1 mr-2">Filter</button>
                                    <a href="https://geniusdevs.com/codecanyon/omnimart40/admin/orders"
                                        class="btn btn-info py-1">Reset</a>
                                </div>
                            </div>
                        </form>


                        <div class="gd-responsive-table">
                            <table class="table table-bordered table-striped" id="admin-table" width="100%"
                                cellspacing="0">

                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Total Amount</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr id="order-bulk-delete">
                                        <td>
                                            {{ $order->uuid }}
                                        </td>

                                        <td>
                                            ${{ $order->total_amount }}
                                        </td>

                                        <td>
                                            {{ $order->payment_status }}
                                        </td>
                                        <td>
                                            {{ $order->order_status }}
                                        </td>
                                        <td>
                                            <div class="action-list">   
                                                <a class="btn btn-secondary btn-sm"
                                                    href="https://geniusdevs.com/codecanyon/omnimart40/admin/order/invoice/156">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm " data-toggle="modal"
                                                    data-target="#confirm-delete" href="javascript:;"
                                                    data-href="https://geniusdevs.com/codecanyon/omnimart40/admin/order/delete/156">
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
    </div>
@endsection
