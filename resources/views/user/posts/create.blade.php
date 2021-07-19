@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <div class="d-grid d-md-flex justify-content-md-end">
                <a class="btn btn-secondary" href="{{ route('posts.index') }}"> Back</a>
            </div>
            <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                <h2>Add New Post</h2>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <hr>
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="control-group col-12 mb-3">
                            <strong>Title:</strong>
                            <input type="text" name="title" class="form-control" placeholder="Post Title">
                            @error('title')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="control-group col-12 mb-3">
                            <strong>Content:</strong>
                            <textarea class="form-control" style="height:150px" name="content"
                                placeholder="Post content"></textarea>
                            @error('content')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="control-group col-12 mb-5">
                            <div class="input-group mb-3">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="d-grid d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary ml-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

