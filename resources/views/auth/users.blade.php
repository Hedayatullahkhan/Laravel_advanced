@extends('layouts.app')

@section('subHeader')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Users</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
        </div>
    </div>
</div>
@endsection
@section('content')
<h4 class="card-title">Users</h4>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <td>User Name</td>
                <td>Email</td>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users  as $index => $row)
            <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email }}</td>
                <td><span class="label label-danger">admin</span> </>
            </tr>    
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection