@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="d-grid d-md-flex justify-content-md-end">
                <a class="btn btn-secondary" href="{{ route('posts.index') }}"> Back</a>
            </div>
            <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                <h2>Edit Post</h2>
                @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
                @endif
                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="control-group col-12 mb-3">
                            <strong>Post Title:</strong>
                            <input type="text" name="title" value="{{ $post->title }}" class="form-control"
                                placeholder="Post Title">
                            @error('title')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="control-group col-12 mb-3">
                            <strong>Post content:</strong>
                            <textarea class="form-control" style="height:150px" name="content"
                                placeholder="Post content">{{ $post->content }}</textarea>
                            @error('content')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="control-group col-12 mb-3">
                            <div class="form-group">
                                <strong>Post Image: {{ $post->image }}</strong>
                                <input type="file" name="image" class="form-control" value="">
                                @error('image')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--button onClick="{/{ Storage::delete($post->image) }}" class="btn btn-outline-secondary">Remove</button-->
                            @if($post->image)
                            <img src="{{ Storage::url($post->image) }}" class="card-img-top" alt="" />
                            @endif
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