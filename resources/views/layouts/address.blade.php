@extends('layouts.app')

@section('content')

<nav class="nav nav-pills mb-4">
    <bs-nav-pill class="{{ Route::is('addresses.show') ? 'active' : '' }}" href="{{ route('addresses.show', $address->id) }}">Show</bs-nav-pill>
    <bs-nav-pill class="{{ Route::is('addresses.edit') ? 'active' : '' }}" href="{{ route('addresses.edit', $address->id) }}">Edit</bs-nav-pill>
</nav>

@yield('addressContent')

@endsection