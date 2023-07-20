@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit Permission</h4><br>
                    <form id="myForm" method="post" action="{{ route('permission.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $permission->id }}">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="basicpill-firstname-input">Permission Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $permission->name }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                            <label class="form-label">Group Name</label>
                                <select name="group_name" class="form-select" aria-label="Default select example">
                                    <option selected disabled>Select Group</option>
                                    
                                    <option value="pos" {{ $permission->group_name == 'pos' ? 'selected' : '' }}> Pos</option>
                                    <option value="employee" {{ $permission->group_name == 'employee' ? 'selected' : '' }}> Employee</option>
                                    <option value="customer" {{ $permission->group_name == 'customer' ? 'selected' : '' }}> Customer</option>
                                    <option value="supplier" {{ $permission->group_name == 'supplier' ? 'selected' : '' }}> Supplier</option>
                                    <option value="salary" {{ $permission->group_name == 'salary' ? 'selected' : '' }}> Salary </option>
                                    <option value="attendence" {{ $permission->group_name == 'attendence' ? 'selected' : '' }}> Attendence </option>
                                    <option value="category" {{ $permission->group_name == 'category' ? 'selected' : '' }}> Category </option>
                                    <option value="product" {{ $permission->group_name == 'product' ? 'selected' : '' }}> Product </option>
                                    <option value="expense" {{ $permission->group_name == 'expense' ? 'selected' : '' }}> Expense </option>
                                    <option value="sales" {{ $permission->group_name == 'sales' ? 'selected' : '' }}> Sales</option>
                                    <option value="stock" {{ $permission->group_name == 'stock' ? 'selected' : '' }}> Stock </option>
                                    <option value="roles" {{ $permission->group_name == 'roles' ? 'selected' : '' }}> Roles</option>
                                
                                </select>
                            </div>
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
                group_name: {
                    required : true,
                }, 
                
            },
            messages :{
                name: {
                    required : 'Please Enter Permission Name',
                }, 
                group_name: {
                    required : 'Please Select Group Name',
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