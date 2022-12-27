@extends('layouts.app')

@section('content')

<h1><a href="{{ route('events.index') }}">All Events</a></h1>

@yield('eventContent')

@endsection