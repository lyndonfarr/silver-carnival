@extends('layouts.contact')

@section('contactContent')
<div class="card my-4">
    <div class="card-header bg-white">Show Contact</div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Name: {{ $contact->full_name }}</li>
        <li class="list-group-item">AKA: {{ $contact->nickname }}</li>
        <li class="list-group-item">Age: {{ $contact->age }}</li>
        <li class="list-group-item">Born: {{ isset($contact->dob) ? $contact->dob->format('l jS \\of F, Y') : null }}</li>
        <li class="list-group-item">Died: {{ isset($contact->dod) ? $contact->dod->format('l jS \\of F, Y') : null }}</li>
        <li class="list-group-item">Nationality: {{ $contact->nationality }}</li>
        <li class="list-group-item">Notes: {{ $contact->notes }}</li>
    </ul>
</div>

@if (count($contact->contactExtras))
<div class="card mb-4">
    <div class="card-header bg-white">ContactExtras</div>
    <ul class="list-group list-group-flush">
        @foreach ($contact->contactExtras as $contactExtra)
            @if ($contactExtra->type === 'email')
                <li class="list-group-item">{{ ucfirst($contactExtra->type) }}: {{ $contactExtra->value }}</li>
            @else
                <li class="list-group-item">{{ ucfirst($contactExtra->type) }}: {{ $contactExtra->value }}</li>
            @endif
        @endforeach
    </ul>
</div>
@endif

@if (count($contact->addresses))
<div class="card mb-4">
    <div class="card-header bg-white">Addresses</div>
    <ul class="list-group list-group-flush">
        @foreach ($contact->addresses as $address)
            <li class="list-group-item">
                <a class="text-dark" href="{{ route('addresses.show', $address->id) }}">{{ $address->full_string }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endif

@endsection