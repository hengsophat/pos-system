@extends('admin.admin_master')
@section('admin')

<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">All Employee</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                        @if(Auth::user()->can('employee.add'))
                                        <a href="{{ route('add.employee') }}" class="btn btn-primary waves-effect waves-light">Add Employee </a>  
                                        @endif
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
                                                <th>Phone</th>
                                                <th>Salary</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @foreach($employee as $key=> $item)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td> <img src="{{ asset($item->image) }}" style="width:50px; height: 40px;"> </td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->phone }}</td>
                                                    <td>{{ $item->salary }}</td>
                                                    <td>
                                                    @if(Auth::user()->can('employee.edit'))
                                                    <a href="{{ route('edit.employee', $item->id) }}" class="btn btn-sm btn-primary waves-effect waves-light">Edit</a>
                                                    @endif
                                                    @if(Auth::user()->can('employee.delete'))
                                                    <a href="{{ route('delete.employee', $item->id) }}" class="btn btn-sm btn-danger waves-effect waves-light" id="delete">Delete</a>
                                                    @endif
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