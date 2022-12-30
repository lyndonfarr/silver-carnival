@extends('layouts.app')

@section('content')

<nav class="nav nav-pills mb-4 justify-content-center">
    <a class="nav-link {{ Route::is('contacts.index') ? 'active' : '' }}" href="{{ route('contacts.index') }}">Index</a>
    <a class="nav-link {{ Route::is('contacts.create') ? 'active' : '' }}" href="{{ route('contacts.create') }}">Create</a>
    @if (Route::is(['contacts.edit', 'contacts.show']))
        <a class="nav-link {{ Route::is('contacts.show') ? 'active' : '' }}" href="{{ route('contacts.show', $contact->id) }}">Show</a>
        <a class="nav-link {{ Route::is('contacts.edit') ? 'active' : '' }}" href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
    @else
        <a class="nav-link disabled" href="#">Show</a>
        <a class="nav-link disabled" href="#">Edit</a>
    @endif
</nav>

@yield('contactContent')

@endsection