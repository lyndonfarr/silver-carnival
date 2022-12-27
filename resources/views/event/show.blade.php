@extends('layouts.event')

@section('eventContent')

<div class="card my-4">
    <div class="card-header d-flex">
        Event
        <edit-button
            class="ml-auto"
            route="{{ route('events.edit', $event->id) }}"
        ></edit-button>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Time: {{ $event->date->format('H:i:s') }}</li>
        <li class="list-group-item">Date: {{ $event->date->format('l jS \\of F, Y') }}</li>
        <li class="list-group-item">Name: {{ $event->name }}</li>
        <li class="list-group-item">Description: {{ $event->description }}</li>
    </ul>
</div>

@endsection