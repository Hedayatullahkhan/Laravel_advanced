@extends('layouts.app')

@section('subHeader')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Departments</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Departments</li>
            </ol>
            <a type="button" href="{{ route('department.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Add</a>
        </div>
    </div>
</div>
@endsection
@section('content')
<h4 class="card-title">Departments</h4>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <td>Title</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments  as $index => $row)
            <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $row->title }}</td>
                <td>{{ Str::limit($row->description ,20)}}</td>
                <td>
                        <div class="d-flex">
                        <div>
                            <a href="{{ route('department.edit',$row->id) }}" type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i> </a>
                        </div>
                       <div>
                        <form action="{{route('department.destroy',$row->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            {{-- <a href="{{ route('department.destroy',$row->id) }}" type="button" class="btn btn-danger btn-circle"><i class="fa  fa-trash-o"></i> </a> --}}
                           <button class="btn btn-danger btn-circle" type="submit">
                            <i class="fa  fa-trash-o"></i>
                           </button>
                           
                        </form> 
                       </div>
                           </div>
                 </td>
            </tr>    
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection