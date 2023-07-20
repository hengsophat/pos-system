@extends('admin.admin_master')
@section('admin')

<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">All Category</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Category</button>  
                                        </ol>
                                    </div>
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Add Category</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('category.store') }}">
                                                    @csrf
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="mb-12">
                                                                    <label class="form-label" for="basicpill-firstname-input">Cetegory Name</label>
                                                                    <input type="text" class="form-control" name="category_name" placeholder="Add Category">
                                                                </div>
                                                             </div>
                                                            </div>
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                                    </div>
                                                    </form>
                                            </div>
                                        </div>
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
                                                <th>Category Name</th>
                                                <th>Action</th>
                                               
                                                
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @foreach($category as $key=> $item)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $item->category_name }}</td>
                                                    <td>
                                                    <a href="{{ route('edit.category', $item->id) }}" class="btn btn-sm btn-primary waves-effect waves-light">Edit</a>
                                                    <a href="{{ route('delete.category', $item->id) }}" class="btn btn-sm btn-danger waves-effect waves-light" id="delete">Delete</a>

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