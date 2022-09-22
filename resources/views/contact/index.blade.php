@extends('layouts.contact')

@section('contactContent')

<ul class="list-group">
    @foreach($contacts as $contact)
        <contact-list-item
            :contact="{{ $contact }}"
        ></contact-list-item>
    @endforeach
</ul>

@endsection