@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style type="text/css">
    
    .form-check-label{
        text-transform: capitalize;
    }
</style>
<div class="page-content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit Role In Permission</h4><br>
                    <form id="myForm" method="post" action="{{ route('role.permission.update',$role->id) }}" enctype="multipart/form-data">
                        @csrf
                    <div class="row">

                    <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Roles Name</label>
                                <h3> {{ $role->name }} </h3>
                            </div>
                        </div>
                    </div>
                    <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="customckeck15">
                            <label class="form-check-label" for="customckeck15">
                                Select All
                            </label>
                    </div>
                    <hr>
                    @foreach($permission_groups as $group)
                    <div class="row">
                        <div class="col-3">
                            @php
                             $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                            @endphp
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="customckeck1" {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : ''}}>
                                <label class="form-check-label" for="customckeck1">
                                    {{ $group->group_name }}
                                </label>
                            </div>
                        </div>
                        <div class="col-9">
                            
                            @foreach($permissions as $permission)
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="customckeck{{ $permission->id }}" name="permission[]" value="{{ $permission->id }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                <label class="form-check-label" for="customckeck{{ $permission->id }}">
                                 {{ $permission->name }}
                                </label>
                            </div>
                            @endforeach
                            <br>
                        </div>
                    </div>
                    @endforeach
                    <br>
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Save">
                    </from>
                    
                  
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    </div>
</div>
<script type="text/javascript">
        $('#customckeck15').click(function(){
            if ($(this).is(':checked')) {
                $('input[type = checkbox]').prop('checked',true);
            }else{
                $('input[type = checkbox]').prop('checked',false);
            } 
        });
</script>
@endsection