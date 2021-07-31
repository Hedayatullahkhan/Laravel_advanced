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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   
                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                    @if (Session::has('employee_created'))
                        <div class="alert alert-success mt-2" role="alert">
                            {{ Session::get('employee_created') }}
                        </div>
                    @endif
                    @if (Session::has('employee_updated'))
                    <div class="alert alert-success mt-2" role="alert">
                        {{ Session::get('employee_updated') }}
                    </div>
                @endif
                    @if (Session::has('employee_deleted'))
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ Session::get('employee_deleted') }}
                        </div>
                    @endif
                    <div class="table-responsive table-sm m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                            cellspacing="0" width="100%">
                           <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Department</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Position</th>
                                    <th>Salary</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                    <th>Blood Group</th>
                                    <th colspan="3" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fetch as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->department->title }}</td>
                                        <td>{{ $row->first_name }}</td>
                                        <td>{{ $row->last_name }}</td>
                                        <td>{{ $row->position }}</td>
                                        <td>{{ $row->salary }}</td>
                                        <td>{{ $row->gender }}</td>
                                        <td>{{ $row->status }}</td>
                                        <td>{{ $row->blood_group }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('employee.edit',$row->id) }}"><button type="button" class="btn btn-success btn-circle"><i class="fa fa-pencil"></i> </button></a>
                                        </td>
                                        <td>
                                            <a href="{{route('employee.show',$row->id)}}"><button type="button" class="btn btn-info btn-circle"> <i class="fa fa-eye"></i></button></a>
                                        </td>
                                        <td><form action="{{ route('employee.destroy',$row->id) }}"  method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
