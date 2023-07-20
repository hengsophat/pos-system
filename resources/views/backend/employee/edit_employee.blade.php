@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit Employee</h4><br>
                    <form method="post" action="{{ route('employee.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $employee->id }}">

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Employee Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $employee->name }}">
                            @error('name')
                        <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Employee Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $employee->email }}">
                            @error('email')
                        <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Employee Phone</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $employee->phone }}">
                            @error('phone')
                        <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Employee Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $employee->address }}">
                            @error('address')
                        <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Employee Experience</label>
                        <div class="col-sm-10">
                        <select name="experience" class="form-select @error('experience') is-invalid @enderror" aria-label="Default select example">
                                                    <option selected disabled>Select Year</option>
                                                    <option value="1" {{ $employee->experience == '1' ? 'selected' : '' }}>1 Year</option>
                                                    <option value="2" {{ $employee->experience == '2' ? 'selected' : '' }}>2 Year</option>
                                                    <option value="3" {{ $employee->experience == '3' ? 'selected' : '' }}>3 Year</option>
                                                    <option value="4" {{ $employee->experience == '4' ? 'selected' : '' }}>4 Year</option>
                                                    <option value="5" {{ $employee->experience == '5' ? 'selected' : '' }}>5 Year</option>
                                                    </select>
                                                    @error('experience')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Employee Salary</label>
                        <div class="col-sm-10">
                            <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ $employee->salary }}">
                            @error('salary')
                        <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Employee Vacation</label>
                        <div class="col-sm-10">
                            <input type="text" name="vacation" class="form-control @error('vacation') is-invalid @enderror" value="{{ $employee->vacation }}">
                            @error('vacation')
                        <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Employee City</label>
                        <div class="col-sm-10">
                            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ $employee->city }}">
                            @error('city')
                        <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Employee Image</label>
                        <div class="col-sm-10">
                            <input class="form-control @error('city') is-invalid @enderror" name="image" type="file" id="image">
                            @error('image')
                        <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{ asset($employee->image) }}" alt="Card image cap">
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