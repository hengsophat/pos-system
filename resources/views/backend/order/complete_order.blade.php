@extends('admin.admin_master')
@section('admin')

<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Complete Sales</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Sl</th>     
                                                <th>Sale Date</th>
                                                <th>Payment</th>
                                                <th>Invoice</th>
                                                <th>Pay</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            @foreach($orders as $key=> $item)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $item->order_date }}</td>
                                                    <td>{{ $item->payment_status }}</td>
                                                    <td>{{ $item->invoice_no }}</td>
                                                    <td>{{ $item->pay }}</td>
                                                    <td><span class="badge bg-success">{{ $item->order_status }}</span></td>
                                                    <td><a href="{{ url('order/invoice-download/'.$item->id) }}" class="btn btn-sm btn-primary waves-effect waves-light"> PDF Invoice </a></td>
                                                </tr>
                                                @endforeach
                                            
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                        
                        
                    </div> <!-- container-fluid -->
                </div>
                
@endsection