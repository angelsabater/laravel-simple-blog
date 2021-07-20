@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto p-2 bd-highlight">
                    <a class="btn btn-secondary" href="{{ route('posts.index') }}"> Back</a>
                </div>
                @if($post->user_id == Auth::user()->id)
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    <div class="p-2 bd-highlight">
                        <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
                @endif
            </div>
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <div class="card mb-2">
                <img src="{{ Storage::url($post->image) }}" class="card-img-top" alt="" />
                <div class="card-body">
                    <h4 class="card-title">{{ $post->title }}</h4>
                    <p class="card-text">{{ $post-> content}}</p>
                </div>
                <div class="card-footer text-muted">
                    Posted at {{$post->created_at->toDateString()}}
                </div>
            </div>

            <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                <h4>Comments</h4>
                <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="control-group col-12 mb-3">
                            <input type="text" name="comment" class="form-control" placeholder="Add a comment..." required>
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                    </div>
                    <div class="d-grid d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary ml-3">Submit</button>
                    </div>
                </form>
                <hr>
                @foreach($comments as $comment)
                <div class="col p-2">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <strong>
                                @if($post->user_id == $comment->id)
                                    You
                                @else
                                    {{ $comment->username }}
                                @endif
                                </strong>
                                <p><small><em>Posted at {{$comment->created_at->toDateString()}}</em></small></p>
                            </h5>
                            <hr>
                            <p class="card-text">{{ $comment->text}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection