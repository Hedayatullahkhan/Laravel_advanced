@extends('layouts.app')
@section('title', 'My HR - New Employee')
@section('content')
<form action="{{ route('tests.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="row">
        <div class="col col-md-6">
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
        </div>
        <div class="col col-md-6">
            <div class="form-group">
                <label for="pic">Choose Profile Image</label>
                <input type="file" class="form-control" name="pic" onchange="previewFile(this)">    
                @error('pic')
                <span class="text-danger">{{ $message }}</span>
                 @enderror
            </div>
            <button type="submit" class="btn btn-success">Upload</button>
        </div>
    </div>
</form>
@endsection