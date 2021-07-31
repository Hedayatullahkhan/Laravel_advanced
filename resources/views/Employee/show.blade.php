@extends('layouts.app')
@section('title', 'My HR - New Employee')
@section('subHeader')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Employee Details</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">Home</a></li>
            </ol>
            <a type="button" href="{{ route('employee.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Add</a>
        </div>
    </div>
</div>
@endsection
@section('content')

       <div class="row">
           <div class="col-md-6">
               <img src={{asset("/storage/myFolder/$employee->image_path")}} class="img-thumbnail" width="400px" height="300px">
           </div>
           <div class="col col-md-6">
              <h3>FirstName: {{$employee->first_name}}</h3>
              <h3>LastName:  {{$employee->last_name}}</h3>
              <h3>Position:  {{$employee->position}}</h3>
              <h3>Salary:    {{$employee->salary}}</h3>
              <h3>Marital Status: {{$employee->status}}</h3>
              <h3>Gender: {{$employee->gender}}</h3>
              <h3>Blood Group: {{$employee->blood_group}}</h3>
           </div>
       </div> 
@endsection