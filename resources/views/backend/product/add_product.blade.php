@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add Product</h4><br>
                    <form id="myForm" method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf
                    <div class="row mb-3 form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="product_name" class="form-control" >
                            
                        </div>
                    </div>

                    <div class="row mb-3 form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                        <select name="category_id" class="form-select aria-label="Default select example">
                            <option selected disabled>Select Category</option>
                            @foreach($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3 form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Product Code</label>
                        <div class="col-sm-10">
                            <input type="text" name="product_code" class="form-control" >
                        </div>
                    </div>

                    <div class="row mb-3 form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Product Garage</label>
                        <div class="col-sm-10">
                            <input type="text" name="product_garage" class="form-control" >
                        </div>
                    </div>

                    <div class="row mb-3 form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Product Store</label>
                        <div class="col-sm-10">
                            <input type="text" name="product_store" class="form-control" >
                        </div>
                    </div>

                    <div class="row mb-3 form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Buying Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="buying_date" class="form-control" >
                        </div>
                    </div>

                    <div class="row mb-3 form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Expire Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="expire_date" class="form-control" >
                        </div>
                    </div>

                    <div class="row mb-3 form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Buying Price</label>
                        <div class="col-sm-10">
                            <input type="text" name="buying_price" class="form-control" >
                        </div>
                    </div>

                    <div class="row mb-3 form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Selling Price</label>
                        <div class="col-sm-10">
                            <input type="text" name="selling_price" class="form-control" >
                        </div>
                    </div>

                    <div class="row mb-3 form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Employee Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="product_image" type="file" id="image">
                            
                        </div>
                    </div>

                    <div class="row mb-3 form-group">
                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
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
                product_name: {
                    required : true,
                }, 
                category_id: {
                    required : true,
                }, 
                
                product_code: {
                    required : true,
                }, 
                product_garage: {
                    required : true,
                }, 
                product_store: {
                    required : true,
                }, 
                buying_date: {
                    required : true,
                }, 
                expire_date: {
                    required : true,
                }, 
                buying_price: {
                    required : true,
                }, 
                selling_price: {
                    required : true,
                }, 
                product_image: {
                    required : true,
                },  
            },
            messages :{
                product_name: {
                    required : 'Please Enter Product Name',
                }, 
                category_id: {
                    required : 'Please Select Category',
                },
                
                product_code: {
                    required : 'Please Enter Product Code',
                },
                product_garage: {
                    required : 'Please Enter Product Garage',
                },
                product_store: {
                    required : 'Please Enter Product Store',
                },
                buying_date: {
                    required : 'Please Slect Buying Date',
                },
                expire_date: {
                    required : 'Please Slect Expire Date',
                },
                buying_price: {
                    required : 'Please Enter Buying Price',
                },
                selling_price: {
                    required : 'Please Enter Selling Price',
                },
                product_image: {
                    required : 'Please Select Product Image',
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

<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>
@endsection