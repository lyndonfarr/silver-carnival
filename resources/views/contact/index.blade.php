@extends('layouts.contact')

@section('contactContent')

<div class="card">
    <div class="card-header">Index Contacts</div>
    <ul class="list-group list-group-flush">
        @foreach($contacts as $contact)
            <contact-list-item
                :contact="{{ $contact }}"
                show-route="{{ route('contacts.show', $contact->id) }}"
            ></contact-list-item>
        @endforeach
    </ul>
</div>

@endsection