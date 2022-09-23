@extends('layouts.contact')

@section('contactContent')

<ul class="list-group">
    @foreach($contacts as $contact)
        <contact-list-item
            :contact="{{ $contact }}"
            show-route="{{ route('contacts.show', $contact->id) }}"
        ></contact-list-item>
    @endforeach
</ul>

@endsection