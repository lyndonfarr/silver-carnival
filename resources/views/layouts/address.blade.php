@extends('layouts.app')

@section('content')

<nav class="nav nav-pills mb-4 justify-content-center">
    <a class="nav-link {{ Route::is('addresses.index') ? 'active' : '' }}" href="{{ route('addresses.index') }}">Index</a>
    <a class="nav-link {{ Route::is('addresses.create') ? 'active' : '' }}" href="{{ route('addresses.create') }}">Create</a>
    <a class="nav-link disabled {{ Route::is('addresses.show') ? 'active' : '' }}" href="#">Show</a>
    <a class="nav-link disabled {{ Route::is('addresses.edit') ? 'active' : '' }}" href="#">Edit</a>
</nav>

@yield('addressContent')

@endsection