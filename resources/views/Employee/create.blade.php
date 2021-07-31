@extends('layouts.app')
@section('title', 'My HR - New Employee')

@section('crumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Employee</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">Employees</a></li>
                    <li class="breadcrumb-item active">New Employee</li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- /.row -->
    <div class="card card-body">
        @if (Session::has('employee_created'))
        <div class="alert alert-success mt-2" role="alert">
            {{ Session::get('employee_created') }}
        </div>
    @endif
        <h3 class="box-title m-b-0">Register New Employee</h3>
        <p>Please fill all fields</p>

        <form method="POST" enctype="multipart/form-data" action="{{ route('employee.store') }}">
            @csrf
         <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="department_id">Department ID</label>
                    <select name="department_id" id="department_id" class="form-control" name="department_id">
                        <option value="" disabled selected>Choose Department</option>
                        @foreach ($fetchDepartment as $row)
                        <option value="{{ $row->id }}" {{ old('department_id') == $row->id ? "selected" :""}}>{{ $row->title }}</option> 
                        @endforeach
                    </select>
                    {{-- <input id="department_id" type="text" placeholder="Department ID" class="form-control" name="department_id">     --}}
                    @error('department_id')
                    <span class="text-danger">{{ $message }}</span>
                 @enderror
                </div>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input id="first_name" type="text" placeholder="First Name" class="form-control" name="first_name" value="{{ old('first_name') }}">    
                    @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                 @enderror
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input id="last_name" type="text" placeholder="Last Name" class="form-control" name="last_name" value="{{ old('last_name') }}">    
                    @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                 @enderror
                </div>

                <div class="form-group">
                    <label for="position">Position</label>
                    <input id="position" type="text" placeholder="Position" class="form-control" name="position" value="{{ old('position') }}">    
                    @error('position')
                    <span class="text-danger">{{ $message }}</span>
                 @enderror
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input id="salary" type="text" placeholder="Salary" class="form-control" name="salary" value="{{ old('salary') }}">    
                    @error('salary')
                    <span class="text-danger">{{ $message }}</span>
                 @enderror
                </div>

            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="" disabled selected>Choose Gender</option>
                            <option value="Male" {{ old('gender')=="Male" ? "selected" :"" }}>Male</option>
                            <option value="Female" {{ old('gender')=="Female" ? "selected" :"" }}>Female</option>
                        </select>
                        {{-- <input id="gender" type="text" placeholder="Gender" class="form-control" name="gender">     --}}
                        @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input id="status" type="text" placeholder="Status" class="form-control" name="status" value="{{ old('status') }}">    
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="blood_group">Blood Group</label>
                        <input id="blood_group" type="text" placeholder="Blood Group" class="form-control" name="blood_group" value="{{ old('blood_group') }}">    
                        @error('blood_group')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="pic">Choose Profile Image</label>
                        <input type="file" class="form-control" name="pic" onchange="previewFile(this)">    
                        <img id="previewImg"  alt="Profile Image" style="max-width: 130px; margin-top:20px;">
                        @error('pic')
                        <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>

                    <button type="submit"
                    class="btn btn-success waves-effect waves-light m-r-10">Save</button>
                    <a href="{{ route('employee.index') }}"><button type="button" class="btn btn-inverse waves-effect waves-light">Cancel</button></a>
            </div>
        </form>
        </div>
        <script>
            function previewFile(input){
               var file=$("inpute[type=file]").get(0).files[0];
               if(file)
               {
                   var reader = new FileReader();
                   reader.onload = function(){
                       $('#previewImg').attr("src",reader.result);
                   }
                   reader.readAsDataURL(file);
               }
            }
        </script>
    @endsection
