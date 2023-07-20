@extends('admin.admin_master')
@section('admin')

<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">All Product</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                        <a href="{{ route('add.product') }}" class="btn btn-primary waves-effect waves-light">Add Product </a>  
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
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Code</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @foreach($product as $key=> $item)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td> <img src="{{ asset($item->product_image) }}" style="width:50px; height: 40px;"> </td>
                                                    <td>{{ $item->product_name }}</td>
                                                    <td>{{ $item['category']['category_name']}}</td>
                                                    <td>{{ $item->product_code }}</td>
                                                    <td>{{ $item->selling_price }}</td>
                                                    <td>
                                                    <a href="{{ route('edit.product', $item->id) }}" class="btn btn-sm btn-primary waves-effect waves-light">Edit</a>
                                                    <a href="{{ route('delete.product', $item->id) }}" class="btn btn-sm btn-danger waves-effect waves-light" id="delete">Delete</a>

                                                    </td>
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