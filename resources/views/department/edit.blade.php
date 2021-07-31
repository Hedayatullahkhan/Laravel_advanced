@extends('layouts.app')

@section('subHeader')

@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card card-body">
            <h3 class="box-title m-b-0">Edit the selected Department</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{ route('department.update',$department->id)}}" >
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{$department->title}}" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="description">description</label>
                            <textarea type="textarea" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description">
                                {{$department->description}}
                            </textarea>
                        </div>

                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection