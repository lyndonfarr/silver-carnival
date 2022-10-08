@extends('layouts.contact')

@section('contactContent')
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <ul class="nav nav-pills card-header-pills d-flex ml-auto">
            <li class="nav-item">
                <edit-button route="{{ route('contacts.edit', $contact->id) }}"></edit-button>
            </li>
        </ul>
    </div>
    <contact-show :contact="{{ $contact }}"></contact-show>
</div>

<div class="card">
    <ul class="list-group list-group-flush">
    @foreach ($contact->contactExtras as $contactExtra)
        <contact-extra-list-item
            :contact-extra="{{ $contactExtra }}"
            edit-route="{{ route('contact-extras.edit', $contactExtra->id) }}"
        ></contact-extra-list-item>
    @endforeach
    </ul>
</div>
@endsection