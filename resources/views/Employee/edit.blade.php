@extends('layouts.app')
@section('title', 'My HR - Employees')
@section('subHeader')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Employee</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('employee.create') }}">Home</a></li>
                <li class="breadcrumb-item active">Employees</li>
            </ol>
            <a type="button" href="{{ route('employee.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Add</a>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="card card-body">
    @if (Session::has('employee_created'))
    <div class="alert alert-success mt-2" role="alert">
        {{ Session::get('employee_created') }}
    </div>
@endif
    <h3 class="box-title m-b-0">Register New Employee</h3>
    <p>Please fill all fields</p>

    <form method="POST" enctype="multipart/form-data" action="{{ route('employee.update', $employee->id) }}">
        @method('PUT')
        @csrf
     <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="department_id">Department ID</label>
                <select name="department_id" id="department_id" class="form-control" name="department_id">
                    <option value="" disabled selected>Choose Department</option>
                    @foreach ($fetchDepartment as $row)
                    <option value="{{ $row->id }}" {{ $employee->department_id == $row->id ? "selected" :""}}>{{ $row->title }}</option> 
                    @endforeach
                </select>
                {{-- <input id="department_id" type="text" placeholder="Department ID" class="form-control" name="department_id">     --}}
                @error('department_id')
                <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input id="first_name" type="text" placeholder="First Name" class="form-control" name="first_name" value="{{$employee->first_name }}">    
                @error('first_name')
                <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input id="last_name" type="text" placeholder="Last Name" class="form-control" name="last_name" value="{{$employee->last_name }}">    
                @error('last_name')
                <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>

            <div class="form-group">
                <label for="position">Position</label>
                <input id="position" type="text" placeholder="Position" class="form-control" name="position" value="{{$employee->position }}">    
                @error('position')
                <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input id="salary" type="text" placeholder="Salary" class="form-control" name="salary" value="{{ $employee->salary}}">    
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
                        <option value="{{ $employee->gender}}" {{ $employee->gender =="Male" ? "selected" :"" }}>Male</option>
                        <option value="{{$employee->gender}}" {{ $employee->gender =="Female" ? "selected" :"" }}>Female</option>
                    </select>
                    {{-- <input id="gender" type="text" placeholder="Gender" class="form-control" name="gender">     --}}
                    @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input id="status" type="text" placeholder="Status" class="form-control" name="status" value="{{ $employee->status }}">    
                    @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

                <div class="form-group">
                    <label for="blood_group">Blood Group</label>
                    <input id="blood_group" type="text" placeholder="Blood Group" class="form-control" name="blood_group" value="{{ $employee->blood_group }}">    
                    @error('blood_group')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="pic">Choose Profile Image</label>
                    <input type="file" class="form-control" name="pic"  onchange="previewFile(this)">    
                    @error('pic')
                    <span class="text-danger">{{ $message }}</span>
                     @enderror
                </div>
               
                   <img src="{{ asset('/public/myFolder'.$employee->image_path) }}" alt="">
               

                <button type="submit"
                class="btn btn-success waves-effect waves-light m-r-10">Update</button>
                <a href="{{ route('employee.index') }}"><button type="button" class="btn btn-inverse waves-effect waves-light">Cancel</button></a>
        </div>
    </form>
    </div>
@endsection