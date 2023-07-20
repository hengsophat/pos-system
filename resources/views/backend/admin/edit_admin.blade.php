@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit Admin</h4><br>
                    <form id="myForm" method="post" action="{{ route('admin.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $adminuser->id }}">
                    <div class="row mb-3 form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" value="{{ $adminuser->name }}">
                            
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" class="form-control" value="{{ $adminuser->username }}">
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" value="{{ $adminuser->email }}">
                            
                        </div>
                    </div>

                    <div class="row mb-3 form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Asign Roles</label>
                        <div class="col-sm-10">
                        <select name="roles" class="form-select" aria-label="Default select example">
                            <option selected disabled>Select Roles</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $adminuser->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Save">

                    </from>
                    
                  
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                username: {
                    required : true,
                },
                email: {
                    required : true,
                }, 
               
                profile_image: {
                    required : true,
                }, 
                password: {
                    required : true,
                }, 
                roles: {
                    required : true,
                }, 
            },
            messages :{
                name: {
                    required : 'Please Enter User Name',
                }, 
                username: {
                    required : 'Please Enter User Name',
                },
                email: {
                    required : 'Please Enter User Email',
                },
                password: {
                    required : 'Please Enter User Password',
                },
                profile_image: {
                    required : 'Please Select User Photo',
                },
                roles: {
                    required : 'Please Select User Role',
                }, 
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>


@endsection