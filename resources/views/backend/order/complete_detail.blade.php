@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sales Details</h4><br>
                    <form method="post" action="{{ route('order.status.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $order->id }}">
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Order Date</label>
                        <div class="col-sm-10">
                            <p class="text-danger"> {{ $order->order_date }} </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Order Invoice</label>
                        <div class="col-sm-10">
                            <p class="text-danger"> {{ $order->invoice_no }} </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Payment Status</label>
                        <div class="col-sm-10">
                            <p class="text-danger"> {{ $order->payment_status }} </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Paid Amount</label>
                        <div class="col-sm-10">
                            <p class="text-danger"> {{ $order->pay }} </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Due Amount</label>
                        <div class="col-sm-10">
                            <p class="text-danger"> {{ $order->due }} </p>
                        </div>
                    </div>
                    </from>
                </div>
                <div class="col-12">    
                    </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total(+vat)</th> 
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orderItem as $item)
                                                <tr> 
                                                    <td> <img src="{{ asset($item->product->product_image) }}" style="width:50px; height: 40px;"> </td>   
                                                    <td>{{ $item->product->product_name }}</td>
                                                    <td>{{ $item->product->product_code }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ $item->product->selling_price }}</td>
                                                    <td>{{ $item->total }}</td> 
                                                </tr>
                                                @endforeach
                                            
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div>
            </div>
        </div> <!-- end col -->
    </div>
    </div>
</div>

@endsection