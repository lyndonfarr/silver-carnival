@extends('layouts.event')

@section('eventContent')

<div class="card">
    <div class="card-header">Index Events</div>
    <ul class="list-group list-group-flush">
        @foreach ($events as $event)
            <li class="list-group-item">
                <a class="text-dark" href="{{ route('events.show', $event->id) }}">{{ $event->date->format('jS \\of F, Y (l)') }}: {{ $event->name }}</a>
            </li>
        @endforeach
    </ul>
</div>

@endsection