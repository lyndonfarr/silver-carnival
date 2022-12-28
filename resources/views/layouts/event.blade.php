@extends('layouts.app')

@section('content')

<nav class="nav nav-pills mb-4 justify-content-center">
    <a class="nav-link {{ Route::is('events.index') ? 'active' : '' }}" href="{{ route('events.index') }}">Index</a>
    <a class="nav-link {{ Route::is('events.create') ? 'active' : '' }}" href="{{ route('events.create') }}">Create</a>
    <a class="nav-link disabled {{ Route::is('events.show') ? 'active' : '' }}" href="#">Show</a>
    <a class="nav-link disabled {{ Route::is('events.edit') ? 'active' : '' }}" href="#">Edit</a>
</nav>

@yield('eventContent')

@endsection