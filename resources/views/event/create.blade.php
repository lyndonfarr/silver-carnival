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
            <div class="card-header">Create Event</div>
            <div class="card-body">
                <text-input
                    label="Name"
                    name="name"
                ></text-input>
                <textarea-input
                    label="Description"
                    name="description"
                ></textarea-input>
                <date-input
                    label="Date"
                    name="date"
                ></date-input>
            </div>
        </div>
        <button
            type="submit"
            class="btn btn-primary btn-block"
        >
            Save
        </button>
    </form>
@endsection()