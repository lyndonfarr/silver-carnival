@extends('layouts.contact')

@section('contactContent')
<form method="POST" action="{{ route('contact-extras.update', $contactExtra->id) }}">
    @csrf
    @method('PUT')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>{{ $contact->full_name }}</span>
            <ul class="nav nav-pills card-header-pills d-flex ml-auto">
                <li class="nav-item">
                    <edit-button route="{{ route('contacts.edit', $contact->id) }}"></edit-button>
                </li>
                <li class="nav-item">
                    <show-button route="{{ route('contacts.show', $contact->id) }}"></show-button>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="form-row">
                <text-input
                    class="col-md-12"
                    label="{{ Str::ucfirst($contactExtra->type) }}"
                    name="value"
                    value="{{ $contactExtra->value }}"
                ></text-input>
            </div>
        </div>
        <div class="card-footer">
            <button
                type="submit"
                class="btn btn-primary btn-block"
            >
                Save
            </button>
        </div>
    </div>
</form>
@endsection