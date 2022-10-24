@extends('layouts.app')

@section('content')

<ul class="list-group">
    @foreach($days as $day => $events)
        <day-list-item
            day="{{ $day }}"
            :events="{{ json_encode($events) }}"
        ></day-list-item>
    @endforeach
</ul>

@endsection