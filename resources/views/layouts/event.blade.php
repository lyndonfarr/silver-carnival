@extends('layouts.app')

@section('content')

<nav class="nav nav-pills mb-4 justify-content-center">
    <a class="nav-link {{ Route::is('events.index') ? 'active' : '' }}" href="{{ route('events.index') }}">Index</a>
    <a class="nav-link {{ Route::is('events.create') ? 'active' : '' }}" href="{{ route('events.create') }}">Create</a>
    @if (Route::is(['events.edit', 'events.show']))
        <a class="nav-link {{ Route::is('events.show') ? 'active' : '' }}" href="{{ route('events.show', $event->id) }}">Show</a>
        <a class="nav-link {{ Route::is('events.edit') ? 'active' : '' }}" href="{{ route('events.edit', $event->id) }}">Edit</a>
    @else
        <a class="nav-link disabled" href="#">Show</a>
        <a class="nav-link disabled" href="#">Edit</a>
    @endif
</nav>

@yield('eventContent')

@endsection