@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add Permission</h4><br>
                    <form id="myForm" method="post" action="{{ route('permission.store') }}" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="basicpill-firstname-input">Permission Name</label>
                                <input type="text" name="name" class="form-control" >
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                            <label class="form-label">Group Name</label>
                                <select name="group_name" class="form-select" aria-label="Default select example">
                                    <option selected disabled>Select Group</option>
                                    
                                    <option value="pos"> Pos</option>
                                    <option value="employee"> Employee</option>
                                    <option value="customer"> Customer</option>
                                    <option value="supplier"> Supplier</option>
                                    <option value="salary"> Salary </option>
                                    <option value="attendence"> Attendence </option>
                                    <option value="category"> Category </option>
                                    <option value="product"> Product </option>
                                    <option value="expense"> Expense </option>
                                    <option value="sales"> Sales</option>
                                    <option value="stock"> Stock </option>
                                    <option value="roles"> Roles</option> 
                                
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