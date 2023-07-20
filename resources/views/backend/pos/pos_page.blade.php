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
                                <div class="card" style="position: relative !important; height: 800px !important;">
                                    <div class="card-body">
                                        <table class="table table-bordered mb-0" style="height: 30%;">
                                            <thead>
                                                <tr class="table-success">
                                                <th>Name</th>
                                                <th>QTY</th>
                                                <th>Price</th>
                                                <th>SubTotal</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>

                                            @php
                                                $allcart = Cart::content();
                                            @endphp

                                            <tbody>
                                                @foreach($allcart as $cart)
                                                <tr class="table-light">
                                                    
                                                    <td>{{ $cart->name }}</td>
                                                    <td>
                                                    <form method="post" action="{{ url('/cart-update/'.$cart->rowId) }}">
                                                    @csrf
                                                    <input type="number" name="qty" value="{{ $cart->qty }}" style="width:40px;" min="1">
                                                <button type="submit" class="btn btn-sm btn-success" style="margin-top:-2px ;"> <i class="fas fa-check"></i> </button> 
                                                        </form>
                                                    </td>
                                                    <td>{{ $cart->price }}</td>
                                                    <td>{{ $cart->price*$cart->qty }}</td>
                                                    <td><a href="{{ url('/cart-remove/'.$cart->rowId) }}"><i class="fas fa-trash-alt" style="color:#111111"></i></a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div style="position: absolute; bottom: 0px; width: 94%;">
                                            <br>
                                            <div>
                                                <table class="table table-bordered mb-0">
                                                    <thead>
                                                        <tr class="table-warning">
                                                        <th>Total Items:</th>
                                                        <th>{{ Cart::count() }}</th>
                                                        <th>Sub Total:</th>
                                                        <th>{{ Cart::subtotal() }}$</th>
                                                        </tr>
                                                    </thead>
                                                    <thead>
                                                        <tr class="table-warning">
                                                        <th>Discount:</th>
                                                        <th>0%</th>
                                                        <th>VAT:</th>
                                                        <th>{{ Cart::tax() }}$</th>
                                                        </tr>
                                                    </thead>
                                                    <thead>
                                                        <tr class="table-danger">
                                                        <th><h5>Total:</h5></th>
                                                        <th><h5>{{ Cart::total() }}$</h5></th>
                                                        </tr>
                                                    </thead>
                                                </table> 
                                            </div>
                                            <br>
                                            <!-- <center>
                                            <p style="font-size:18px;">Quantity : {{ Cart::count() }} </p>
                                            <p style="font-size:18px;">SubTotal : {{ Cart::subtotal() }} </p>
                                            <p style="font-size:18px;">Vat : {{ Cart::tax() }} </p>
                                            <p><h2> Total </h2> <h1> {{ Cart::total() }}</h1></p>
                                            </center> -->

                                            <form id="myForm" method="post" action="{{ url('/create-invoice') }}">
                                                @csrf
                                                <center>
                                                    <button class="btn btn-primary waves-effect waves-light" style="border-radius: 2px;">Create Invoice</button>
                                                </center>
                                                <br>
                                            </form>
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
                                            <th></th>
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
                                                        <td><button type="submit" style="font-size: 20px; color: #000;" > <i class="fas fa-cart-plus"></i> </button> </td> 
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
                
@endsection