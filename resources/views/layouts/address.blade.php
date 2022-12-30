@extends('layouts.app')

@section('content')

<nav class="nav nav-pills mb-4 justify-content-center">
    <a class="nav-link {{ Route::is('addresses.show') ? 'active' : '' }}" href="{{ route('addresses.show', $address->id) }}">Show</a>
    <a class="nav-link {{ Route::is('addresses.edit') ? 'active' : '' }}" href="{{ route('addresses.edit', $address->id) }}">Edit</a>
</nav>

@yield('addressContent')

@endsection