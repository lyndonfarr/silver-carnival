@extends('layouts.app')

@section('content')

<h1 class="mb-4">
    Contacts <create-button route="{{ route('contacts.create') }}"></create-button> <index-button route="{{ route('contacts.index') }}"></index-button>
</h1>

@yield('contactContent')

@endsection