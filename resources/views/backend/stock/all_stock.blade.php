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
                                            <th>Stock</th>
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
                                                    <td><span class="btn btn-sm btn-info">{{ $item->product_store }}</span></td>
                                                    
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