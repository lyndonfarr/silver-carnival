@extends('layouts.address')

@section('addressContent')
    <div class="card mb-4">
        <div class="card-header d-flex">
            Show Address
            <edit-button
                class="ml-auto"
                route="{{ route('addresses.edit', $address->id) }}"
            ></edit-button>
        </div>
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
                    <li class="list-group-item d-flex align-items-start">
                        <p class="mb-0">{{ $contact->full_name }}</p>
                        <show-button
                            class="ml-auto"
                            route="{{ route('contacts.show', $contact->id) }}"
                        ></show-button>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection