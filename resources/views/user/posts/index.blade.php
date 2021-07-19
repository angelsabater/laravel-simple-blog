@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 margin-tb">
            <a class="d-flex text-center btn btn-secondary mb-2" href="{{ route('posts.create') }}"> New Post</a>
            <form action="{{ route('posts.index') }}" method="GET" role="search">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Search..."
                        aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-lg-8">
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            @if(count($posts) > 0)
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
            @else
            <h3>There's nothing around here...</h3>
            @endif
        </div>
    </div>
</div>
@endsection