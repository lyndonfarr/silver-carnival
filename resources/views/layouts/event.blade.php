@extends('layouts.app')

@section('content')

<nav class="nav nav-pills mb-4 justify-content-center">
    <bs-nav-pill class="{{ Route::is('events.index') ? 'active' : '' }}" href="{{ route('events.index') }}">Index</bs-nav-pill>
    <bs-nav-pill class="{{ Route::is('events.create') ? 'active' : '' }}" href="{{ route('events.create') }}">Create</bs-nav-pill>
    @if (Route::is(['events.edit', 'events.show']))
        <bs-nav-pill class="{{ Route::is('events.show') ? 'active' : '' }}" href="{{ route('events.show', $event->id) }}">Show</bs-nav-pill>
        <bs-nav-pill class="{{ Route::is('events.edit') ? 'active' : '' }}" href="{{ route('events.edit', $event->id) }}">Edit</bs-nav-pill>
    @else
        <bs-nav-pill class="disabled" href="#">Show</bs-nav-pill>
        <bs-nav-pill class="disabled" href="#">Edit</bs-nav-pill>
    @endif
</nav>

@yield('eventContent')

@endsection