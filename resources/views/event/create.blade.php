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

    <form method="POST" action="{{ route('events.store') }}">
        @csrf
        <div class="card mb-4">
            <div class="card-header bg-white">Create Event</div>
            <div class="card-body">
                <text-input
                    label="Name"
                    name="name"
                    value="{{ old('name') }}"
                ></text-input>
                <textarea-input
                    label="Description"
                    name="description"
                    value="{{ old('description') }}"
                ></textarea-input>
                <date-input
                    label="Date"
                    name="date"
                    value="{{ old('date') }}"
                ></date-input>
                <time-input
                    label="Time"
                    name="time"
                    value="{{ old('time') }}"
                ></time-input>
            </div>
        </div>
        <button
            type="submit"
            class="btn btn-dark btn-block"
        >
            Save
        </button>
    </form>
@endsection()