@extends('layouts.address')

@section('addressContent')
    <div class="card mb-4">
        <div class="card-header">Show Address</div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Line 1: {{ $address->line_1 }}</li>
            <li class="list-group-item">Line 2: {{ $address->line_2 }}</li>
            <li class="list-group-item">City: {{ $address->city }}</li>
            <li class="list-group-item">State: {{ $address->state }}</li>
            <li class="list-group-item">Post Code: {{ $address->post_code }}</li>
            <li class="list-group-item">Country: {{ $address->country }}</li>
        </ul>
    </div>

    @if (!empty($address->contacts))
        <div class="card">
            <div class="card-header">Contacts</div>
            <ul class="list-group list-group-flush">
                @foreach ($address->contacts as $contact)
                    <li class="list-group-item">
                        <a class="text-dark" href="{{ route('contacts.show', $contact->id) }}">{{ $contact->full_name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection