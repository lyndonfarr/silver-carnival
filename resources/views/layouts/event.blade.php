@extends('layouts.app')

@section('content')

<nav class="nav nav-pills mb-4">
    <bs-nav-pill class="{{ Route::is('events.index') ? 'active' : '' }}" href="{{ route('events.index') }}">Index</bs-nav-pill>
    <bs-nav-pill class="{{ Route::is('events.create') ? 'active' : '' }}" href="{{ route('events.create') }}">Create</bs-nav-pill>
    @if (Route::is(['events.edit', 'events.show']))
        <bs-nav-pill class="{{ Route::is('events.show') ? 'active' : '' }}" href="{{ route('events.show', $event->id) }}">Show</bs-nav-pill>
        <bs-nav-pill class="{{ Route::is('events.edit') ? 'active' : '' }}" href="{{ route('events.edit', $event->id) }}">Edit</bs-nav-pill>
    @else
        <bs-nav-pill class="disabled" href="#">Show</bs-nav-pill>
        <bs-nav-pill class="disabled" href="#">Edit</bs-nav-pill>
    @endif

    @if (Route::is(['events.index']))
        <form class="form-inline ml-auto">
            <div class="form-group mx-sm-3">
                <label for="search" class="sr-only">Search</label>
                <input type="text" class="form-control" id="search" placeholder="Search...">
            </div>
            <button type="submit" class="btn btn-dark">Search</button>
        </form>
    @endif
</nav>

@yield('eventContent')

@endsection