@extends('layouts.app')

@section('content')

<h1>Calendar</h1>

<ul class="list-group">
    @foreach($days as $day => $events)
        <div class="card mb-4">
            <div class="card-header">{{ $day }}</div>
            <ul class="list-group list-group-flush">
                @foreach ($events as $event)
                    <li class="list-group-item">
                        <a href="{{ route('events.show', $event['id']) }}">{{ $event['name'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</ul>

@endsection