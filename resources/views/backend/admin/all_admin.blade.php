@extends('admin.admin_master')
@section('admin')

<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">All Admin <span class="badge badge-pill bg-danger">{{ count($alladminuser) }}</span></h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                        <a href="{{ route('addd.admin') }}" class="btn btn-primary waves-effect waves-light">Add Admin </a>  
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
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @foreach($alladminuser as $key=> $item)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td> <img src="{{ (!empty($item->profile_image))? url('upload/admin_images/'.$item->profile_image):url('upload/no_image.jpg') }}" style="width:50px; height: 40px;"> </td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td> 
                                                        @foreach($item->roles as $role)
                                                            <span class="badge badge-pill bg-danger"> {{ $role->name }} </span>
                                                        @endforeach
                                                        </td> 
                                                    <td>
                                                    <a href="{{ route('edit.admin', $item->id) }}" class="btn btn-sm btn-primary waves-effect waves-light">Edit</a>
                                                    <a href="{{ route('delete.admin', $item->id) }}" class="btn btn-sm btn-danger waves-effect waves-light" id="delete">Delete</a>
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