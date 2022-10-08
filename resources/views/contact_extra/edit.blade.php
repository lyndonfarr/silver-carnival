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
        @if($contactExtra->id !== $id)
            <contact-extra-list-item
                :contact-extra="{{ $contactExtra }}"
                edit-route="{{ route('contact-extras.edit', $contactExtra->id) }}"
                update-route="{{ route('contact-extras.update', $contactExtra->id) }}"
            ></contact-extra-list-item>
        @else
        <div class="list-group-item">
            <form method="POST" action="{{ route('contact-extras.update', $contactExtra->id) }}" class="form-inline">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="contactExtra">{{ Str::ucfirst($contactExtra->type) }}</label>
                    <input
                        class="form-control mx-sm-3"
                        id="contactExtra"
                        type="string"
                        value="{{ $contactExtra->value }}"
                    >
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Save
                    </button>
                </div>
            </form>
        </div>
        @endif
    @endforeach
    </ul>
</div>
@endsection