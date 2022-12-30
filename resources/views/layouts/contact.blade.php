@extends('layouts.app')

@section('content')

<nav class="nav nav-pills mb-4">
    <bs-nav-pill class="{{ Route::is('contacts.index') ? 'active' : '' }}" href="{{ route('contacts.index') }}">Index</bs-nav-pill>
    <bs-nav-pill class="{{ Route::is('contacts.create') ? 'active' : '' }}" href="{{ route('contacts.create') }}">Create</bs-nav-pill>
    @if (Route::is(['contacts.edit', 'contacts.show']))
        <bs-nav-pill class="{{ Route::is('contacts.show') ? 'active' : '' }}" href="{{ route('contacts.show', $contact->id) }}">Show</bs-nav-pill>
        <bs-nav-pill class="{{ Route::is('contacts.edit') ? 'active' : '' }}" href="{{ route('contacts.edit', $contact->id) }}">Edit</bs-nav-pill>
    @else
        <bs-nav-pill class="disabled" href="#">Show</bs-nav-pill>
        <bs-nav-pill class="disabled" href="#">Edit</bs-nav-pill>
    @endif

    @if (Route::is(['contacts.index']))
        <form class="form-inline ml-auto" action="{{ route('contacts.index') }}">
            <div class="form-group mx-sm-3">
                <label for="search" class="sr-only">Search</label>
                <input
                    class="form-control"
                    id="search"
                    name="search"
                    placeholder="Search..."
                    type="text"
                    value="{{ Request::get('search') }}"
                >
            </div>
            <button type="submit" class="btn btn-dark">Search</button>
        </form>
    @endif
</nav>

@yield('contactContent')

@endsection