@extends('layouts.admin')
@section('title')
    Transactions
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
                            <h3 class=" mb-0 bc-title"><b>Transactions</b></h3>
                            {{-- <div class="right">
                                <a href="https://geniusdevs.com/codecanyon/omnimart40/admin/transaction/csv/export"
                                    class="btn btn-info btn-sm d-inline-block">CSV Export</a>
                                <form class="d-inline-block"
                                    action="https://geniusdevs.com/codecanyon/omnimart40/admin/bulk/deletes" method="get">
                                    <input type="hidden" value="" name="ids[]" id="bulk_delete">
                                    <input type="hidden" value="transactions" name="table">
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div> --}}
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
                                        <th>Customer Email</th>
                                        <th>Transaction ID</th>
                                        <th>Order Status</th>
                                        <th>Payment Status</th>
                                        <th>Total Amount</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr id="transaction-bulk-delete">
                                            <td>
                                                {{ $transaction->users->email }}
                                            </td>
                                            <td>
                                                {{ $transaction->order_id }}
                                            </td>
                                            <td>
                                                <p class="badge badge-dark">{{ $transaction->order_status }}</p>
                                            </td>
                                            <td>
                                                <p class="badge badge-primary">{{ $transaction->payment_status }}</p>
                                            </td>
                                            <td>
                                                ${{ number_format($transaction->total_amount,2) }}

                                            </td>
                                            {{-- <td>
                                                <div class="action-list">
                                                    <a class="btn btn-danger btn-sm " data-toggle="modal"
                                                        data-target="#confirm-delete" href="javascript:;"
                                                        data-href="{{ route('admin.transactions.delete', ['id' => $transaction->id]) }}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
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
                        Are you sure Do you want to delete it?
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
@endsection
