@extends('layouts.event')

@section('eventContent')

<div class="card my-4">
    <div class="card-header bg-white">Show Event</div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Name: {{ $event->name }}</li>
        <li class="list-group-item">Description: {{ $event->description }}</li>
        <li class="list-group-item">Date: {{ $event->date->format('l jS \\of F, Y') }}</li>
        <li class="list-group-item">Time: {{ $event->date->format('H:i:s') }}</li>
    </ul>
</div>

@endsection