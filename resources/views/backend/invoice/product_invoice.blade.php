@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Invoice</h4>

                    

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="invoice-title">
                                    <h4 class="float-end font-size-16"><strong>Order # 12345</strong></h4>
                                    <h3>
                                        <img src="{{ asset('backend/assets/images/senghokheng.png') }}" alt="logo" height="50"/>
                                    </h3>
                                </div>
                                <hr>
                                <div class="row">
                                    
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-4">
                                        
                                    </div>
                                    <div class="col-6 mt-4 text-end">
                                        <address>
                                            <strong>Order Date:</strong><br>
                                            January 16, 2019<br><br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <div class="p-2">
                                        <h3 class="font-size-16"><strong>Order summary</strong></h3>
                                    </div>
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td><strong>Item</strong></td>
                                                    <td class="text-center"><strong>Price</strong></td>
                                                    <td class="text-center"><strong>Quantity</strong>
                                                    </td>
                                                    <td class="text-end"><strong>Totals</strong></td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                $sl = 1;
                                                @endphp
                                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                @foreach($contents as $key=> $item)
                                                
                                                <tr>
                                                    <td>{{ $sl++ }}</td>
                                                    <td><b>{{ $item->name }}</b></td>
                                                    <td class="text-center">{{ $item->qty }}</td>
                                                    <td class="text-center">{{ $item->price }}</td>
                                                    <td class="text-end">${{ $item->price*$item->qty }}</td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                            <div class="col-sm-12">
                                            <div class="float-end">
                                                <p><b>Sub-total:</b> <span class="float-end">${{ Cart::subtotal() }}</span></p>
                                                <p><b>Vat (10%):</b> <span class="float-end"> &nbsp;&nbsp;&nbsp; ${{ Cart::tax() }}</span></p>
                                                <h3>${{ Cart::total() }} USD</h3>
                                            </div>
                                            <div class="clearfix"></div>
                                        <div class="d-print-none col-sm-12">
                                            <div class="float-end">
                                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create Invoice</button>
                                            </div>
                            </div>
                        </div> <!-- end row -->
                    
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mt-2 mb-4 ">
                    <div class="auth-logo">
                        <h3>Total Amount  ${{ Cart::total() }}</h3>
                    </div>
                </div>
                <form method="post" action="{{ url('/final-invoice') }}">
                @csrf
                    
                    <div class="row">
                        <div class="col-lg-12">
                        
                            <div class="mb-3">
                                <label for="username" class="form-label">Payment</label>
                                <select name="payment_status" class="form-select" id="example-select">
                                    <option selected disabled >Select Payment </option>
                                    <option value="HandCash">HandCash</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Due">Due</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Payment</label>
                                <select name="order_status" class="form-select" id="example-select">
                                    <option selected disabled >Select Payment </option>
                                    <option value="complete">Complete</option>
                                    <option value="pending">Pending</option>
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Pay Now</label>
                                    <input class="form-control" type="text" name="pay" placeholder="Pay Now">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Due Amount</label>
                                    <input class="form-control" type="text" name="due" placeholder="Due Amount ">
                            </div>

                                <input type="hidden" name="order_date" value="{{ date('d-F-Y') }}">
                                
                                <input type="hidden" name="total_products" value="{{ Cart::count() }}">
                                <input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
                                <input type="hidden" name="vat" value="{{ Cart::tax() }}">
                                <input type="hidden" name="total" value="{{ Cart::total() }}"> 

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                    </div>
                </form>
        </div>
    </div>
</div>

@endsection