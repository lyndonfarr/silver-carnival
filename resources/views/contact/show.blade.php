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
        <li class="list-group-item">Born: {{ $contact->dob }}</li>
        <li class="list-group-item">Nationality: {{ $contact->nationality }}</li>
        <li class="list-group-item">Notes: {{ $contact->notes }}</li>
    </ul>
</div>
@if (count($contact->contactExtras))
<div class="card">
    <ul class="list-group list-group-flush">
        @foreach ($contact->contactExtras as $contactExtra)
            <li class="list-group-item">{{ ucfirst($contactExtra->type) }}: {{ $contactExtra->value }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection