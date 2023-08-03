@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">POS</h4>                        
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="row">
            <div class="col-xl-6" >
                <div class="row">
                    <div class="card" style="position: relative !important; height: auto; !important;">
                        <div class="card-body">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr class="table-success">
                                    <th>Name</th>
                                    <th>QTY</th>
                                    <th>Price</th>
                                    <th>SubTotal</th>
                                    <th><center>Action</center></th>
                                    </tr>
                                </thead>

                                @php
                                    $allcart = Cart::content();
                                @endphp

                                <tbody>
                                    @foreach($allcart as $cart)
                                    <tr class="table-light">
                                        <input type="hidden" name="id" value="{{ $cart->id }}">
                                        <td>{{ $cart->name }}</td>
                                        <td>
                                        <form method="post" action="{{ url('/cart-update/'.$cart->rowId) }}">
                                        @csrf
                                        
                                        <input type="number" name="qty" value="{{ $cart->qty }}" style="width:40px;" min="1">
                                        <button type="submit" class="btn btn-sm btn-success" style="margin-top:-2px ;"> <i class="fas fa-check"></i> </button> 
                                        </form>
                                        </td>
                                        <td>{{ $cart->price }} $</td>
                                        <td>{{ $cart->price*$cart->qty }} $</td>
                                        <td><center><a href="{{ url('/cart-remove/'.$cart->rowId) }}"><i class="fas fa-trash-alt" style="color:#111111"></i></a></center></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card" >
                        <div class="card-body">
                            <div>
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr class="table-warning">
                                        <th>Total Items:</th>
                                        <th>{{ Cart::count() }}</th>
                                        <th>Sub Total:</th>
                                        <th>{{ Cart::subtotal() }} $</th>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr class="table-warning">
                                        <th>Discount:</th>
                                        <th>0%</th>
                                        <th>VAT:</th>
                                        <th>{{ Cart::tax() }} $</th>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr class="table-danger">
                                        <th><h5>Total:</h5></th>
                                        <th><h5>{{ Cart::total() }} $</h5></th>
                                        </tr>
                                    </thead>
                                </table> 
                                <br>
                                <!-- <center>
                                <p style="font-size:18px;">Quantity : {{ Cart::count() }} </p>
                                <p style="font-size:18px;">SubTotal : {{ Cart::subtotal() }} </p>
                                <p style="font-size:18px;">Vat : {{ Cart::tax() }} </p>
                                <p><h2> Total </h2> <h1> {{ Cart::total() }}</h1></p>
                                </center> -->
                                <div class="col-12 d-flex flex-row" style="position: relative !important;">
                                    <form id="myForm" class="me-2" method="post" action="{{ url('/clear-invoice') }}">
                                        @csrf
                                        <center>
                                            <button class="btn btn-danger waves-effect waves-light" style="border-radius: 2px;">Clear</button>
                                        </center>
                                    </form>
                                    <form id="myForm" class="me-2" method="post" action="{{ url('/create-invoice') }}">
                                        @csrf
                                        <center>
                                            <button class="btn btn-warning waves-effect waves-light" style="border-radius: 2px;">Hold</button>
                                        </center>
                                    </form>
                                    <form id="myForm" class="me-2" method="post" action="{{ url('/print-invoice') }}">
                                        @csrf
                                        <center>
                                            <button class="btn btn-primary waves-effect waves-light" style="border-radius: 2px;">Print Order</button>
                                        </center>
                                    </form>
                                    <div>
                                        @csrf
                                        <center>
                                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="border-radius: 2px;">Create Invoice</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr class="table-success">
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $key=> $item)
                                <tr class="table-light">
                                    <form method="post" action="{{ url('/add-cart') }}">

                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="hidden" name="name" value="{{ $item->product_name }}">
                                        <input type="hidden" name="qty" value="1">
                                        <input type="hidden" name="price" value="{{ $item->selling_price }}">
                                        
                                        <td>{{ $key+1 }}</td>
                                        <td> <img src="{{ asset($item->product_image) }}" style="width:50px; height: 40px;"> </td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->selling_price }}</td>
                                        <td><button type="submit" style="font-size: 15px; color: #000;" class="btn btn-success waves-effect waves-light"> <i class="fas fa-cart-plus"></i> </button> </td> 
                                    </form>
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