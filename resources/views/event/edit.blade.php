@extends('layouts.event')

@section('eventContent')

<form method="POST" action="{{ route('events.update', $event->id) }}">
    @csrf
    @method('PATCH')
    <div class="card my-4">
        <div class="card-header">Edit Event</div>
        <div class="card-body">
            <text-input
                label="Name"
                name="name"
                value="{{ $event->name }}"
            ></text-input>
            <textarea-input
                label="Description"
                name="description"
                value="{{ $event->description }}"
            ></textarea-input>
            <date-input
                label="Date"
                name="date"
                value="{{ $event->date }}"
            ></date-input>
        </div>
    </div>
    <button class="btn btn-primary btn-block">Save</button>
</form>

@endsection