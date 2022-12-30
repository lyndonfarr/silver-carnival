@extends('layouts.app')

@section('content')

<nav class="nav nav-pills mb-4 justify-content-center">
    <bs-nav-pill class="{{ Route::is('contacts.index') ? 'active' : '' }}" href="{{ route('contacts.index') }}">Index</bs-nav-pill>
    <bs-nav-pill class="{{ Route::is('contacts.create') ? 'active' : '' }}" href="{{ route('contacts.create') }}">Create</bs-nav-pill>
    @if (Route::is(['contacts.edit', 'contacts.show']))
        <bs-nav-pill class="{{ Route::is('contacts.show') ? 'active' : '' }}" href="{{ route('contacts.show', $contact->id) }}">Show</bs-nav-pill>
        <bs-nav-pill class="{{ Route::is('contacts.edit') ? 'active' : '' }}" href="{{ route('contacts.edit', $contact->id) }}">Edit</bs-nav-pill>
    @else
        <bs-nav-pill class="disabled" href="#">Show</bs-nav-pill>
        <bs-nav-pill class="disabled" href="#">Edit</bs-nav-pill>
    @endif
</nav>

@yield('contactContent')

@endsection