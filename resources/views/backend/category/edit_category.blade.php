@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit Category</h4><br>
                    <form method="post" action="{{ route('category.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $category->id }}">
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control" >
                            
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