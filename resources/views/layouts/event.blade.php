@extends('layouts.app')

@section('content')

<h1 class="mb-4">
    Events <create-button route="{{ route('events.create') }}"></create-button> <index-button route="{{ route('events.index') }}"></index-button>
</h1>

@yield('eventContent')

@endsection