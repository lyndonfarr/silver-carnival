@extends('layouts.app')

@section('content')

<h1><a href="{{ route('contacts.index') }}">All Contacts</a></h1>

@yield('contactContent')

@endsection