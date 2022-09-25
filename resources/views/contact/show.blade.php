@extends('layouts.contact')

@section('contactContent')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <ul class="nav nav-pills card-header-pills d-flex">
            @if (isset($contact->primaryInstagram))
            <li class="nav-item">
                <instagram-button instagram="{{ $contact->primaryInstagram->value }}"></instagram-button>
            </li>
            @endif
            @if (isset($contact->primaryPhoneNumber))
            <li class="nav-item">
                <whats-app-button phone-number="{{ $contact->primaryPhoneNumber->value }}"></whats-app-button>
            </li>
            @endif
        </ul>
        <ul class="nav nav-pills card-header-pills d-flex">
            <li class="nav-item ml-auto">
                <edit-button route="{{ route('contacts.edit', $contact->id) }}"></edit-button>
            </li>
        </ul>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            Name: {{ $contact->full_name }}
        </li>
        @if (isset($contact->nickname))
        <li class="list-group-item">
            AKA: {{ $contact->nickname }}
        </li>
        @endif
        @if (isset($contact->dob))
        <li class="list-group-item">
            Age: {{ $contact->age }}
        </li>
        @endif
        <li class="list-group-item">
            Born: {{ $contact->dob }}
        </li>
        <li class="list-group-item">
            Nationality: {{ $contact->nationality }}
        </li>
        <li class="list-group-item">
            Notes: {{ $contact->notes }}
        </li>
    </ul>
</div>
@endsection