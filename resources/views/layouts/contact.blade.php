@extends('layouts.app')

@section('content')

<nav class="nav nav-pills mb-4 justify-content-center">
    <a class="nav-link {{ Route::is('contacts.index') ? 'active' : '' }}" href="{{ route('contacts.index') }}">Index</a>
    <a class="nav-link {{ Route::is('contacts.create') ? 'active' : '' }}" href="{{ route('contacts.create') }}">Create</a>
    <a class="nav-link disabled {{ Route::is('contacts.show') ? 'active' : '' }}" href="#">Show</a>
    <a class="nav-link disabled {{ Route::is(['contacts.edit', 'contact-extras.edit']) ? 'active' : '' }}" href="#">Edit</a>
</nav>

@yield('contactContent')

@endsection