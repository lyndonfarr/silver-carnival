@extends('layouts.contact')

@section('contactContent')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>{{ $contact->full_name }}</span>
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
                <edit-button
                    route="{{ route('contacts.edit', $contact->id) }}"
                ></edit-button>
            </li>
        </ul>
    </div>
    <div class="card-body">

    </div>
</div>
@endsection