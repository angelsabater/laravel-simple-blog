@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 margin-tb">
            <a class="d-flex text-center btn btn-secondary mb-2" href="{{ route('posts.create') }}"> New Post</a>
            <form action="{{ route('posts.index') }}" method="GET" role="search">
                <input type="text" name="search" class="form-control mb-2" placeholder="Search..." required>
                <button type="submit" class="d-flex btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-lg-8">
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            @foreach($posts as $post)
            <div class="card mb-5">
                <img src="{{ Storage::url($post->image) }}" class="card-img-top" alt="" />
                <div class="card-body">
                    <h4 class="card-title">{{ $post->title }}</h4>
                    <p class="card-text">{{ $post-> content}}</p>
                    <a class="btn btn-primary" href="{{ route('posts.show', $post->id) }}">Read More</a>
                </div>
                <div class="card-footer text-muted">
                    Posted at {{$post->created_at->toDateString()}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection