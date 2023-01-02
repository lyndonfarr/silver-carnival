@extends('layouts.event')

@section('eventContent')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('events.update', $event->id) }}">
        @csrf
        @method('PATCH')
        <div class="card my-4">
            <div class="card-header bg-white">Edit Event</div>
            <div class="card-body">
                <text-input
                    label="Name"
                    name="name"
                    value="{{ old('name') ?? $event->name }}"
                ></text-input>
                <textarea-input
                    label="Description"
                    name="description"
                    value="{{ old('description') ?? $event->description }}"
                ></textarea-input>
                <date-input
                    label="Date"
                    name="date"
                    value="{{ old('date') ?? $event->date }}"
                ></date-input>
                <time-input
                    label="Time"
                    name="time"
                    value="{{ old('time') ?? $event->date->format('H:i:s') }}"
                ></time-input>
            </div>
        </div>
        <button class="btn btn-dark btn-block">Save</button>
    </form>

@endsection