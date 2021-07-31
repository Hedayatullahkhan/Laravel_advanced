@extends('layouts.app')

@section('subHeader')

@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card card-body">
            <h3 class="box-title m-b-0">Sample Basic Forms</h3>
            <p class="text-muted m-b-30 font-13"> Bootstrap Elements </p>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{ route('department.store') }}" >
                       @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="description">description</label>
                            <textarea type="textarea" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection