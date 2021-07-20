@extends('layouts.main')

@section('content')
<img style="width: 20%" src="https://media.giphy.com/media/l0HlGeTBdTqMll15u/giphy.gif">
<h1 class="display-4 m-2">Hi, {{ Auth::user()->name }}</h1>
<div class="text-sm sm:ml-0">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
</div>
<ul class="nav justify-content-center">
    @if (Session::get('isAdmin'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">{{ __('Manage') }}</a>
    </li>
    @else
    <li class="nav-item">
        <a class="nav-link" href="{{ route('posts.index') }}">{{ __('Posts') }}</a>
    </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>
@endsection