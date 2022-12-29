@extends('layouts.contact')

@section('contactContent')
<div class="card my-4">
    <div class="card-header d-flex">
        Show Contact
        <edit-button
            class="ml-auto"
            route="{{ route('contacts.edit', $contact->id) }}"
        ></edit-button>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Name: {{ $contact->full_name }}</li>
        <li class="list-group-item">AKA: {{ $contact->nickname }}</li>
        <li class="list-group-item">Age: {{ $contact->age }}</li>
        <li class="list-group-item">Born: {{ isset($contact->dob) ? $contact->dob->format('l jS \\of F, Y') : null }}</li>
        <li class="list-group-item">Nationality: {{ $contact->nationality }}</li>
        <li class="list-group-item">Notes: {{ $contact->notes }}</li>
    </ul>
</div>

@if (count($contact->contactExtras))
<div class="card mb-4">
    <div class="card-header">ContactExtras</div>
    <ul class="list-group list-group-flush">
        @foreach ($contact->contactExtras as $contactExtra)
            <li class="list-group-item">{{ ucfirst($contactExtra->type) }}: {{ $contactExtra->value }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (count($contact->addresses))
<div class="card mb-4">
    <div class="card-header">Addresses</div>
    <ul class="list-group list-group-flush">
        @foreach ($contact->addresses as $address)
            <li class="list-group-item d-flex align-items-start">
                <p class="mb-0">{{ $address->full_string }}</p>
                <show-button
                    class="ml-auto"
                    route="{{ route('addresses.show', $address->id) }}"
                ></show-button>
                <edit-button
                    class="ml-2"
                    route="{{ route('addresses.edit', $address->id) }}"
                ></edit-button>
            </li>
        @endforeach
    </ul>
</div>
@endif

@endsection