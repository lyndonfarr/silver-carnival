@extends('layouts.contact')

@section('contactContent')
    <form method="POST" action="{{url('contacts')}}">
        @csrf
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Edit Contact</span>
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                        <show-button
                            route="{{ route('contacts.show', $contact->id) }}"
                        ></show-button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <text-input
                        class="col-md-12"
                        label="First Name"
                        name="first_name"
                        value="{{ $contact->first_name }}"
                    ></text-input>
                </div>
                <div class="form-row">
                    <text-input
                        class="col-md-12"
                        label="Middle Names"
                        name="middle_names"
                        value="{{ $contact->middle_names }}"
                    ></text-input>
                </div>
                <div class="form-row">
                    <text-input
                        class="col-md-12"
                        label="Last Name"
                        name="last_name"
                        value="{{ $contact->last_name }}"
                    ></text-input>
                </div>
                <div class="form-row">
                    <text-input
                        class="col-md-12"
                        label="Nickname"
                        name="nickname"
                        value="{{ $contact->nickname }}"
                    ></text-input>
                </div>
                <div class="form-row">
                    <country-input
                        class="col-md-12"
                        label="Nationality"
                        name="nationality"
                    ></country-input>
                </div>
                <div class="form-row">
                    <date-input
                        class="col-md-12"
                        label="Date of Birth"
                        name="dob"
                    ></date-input>
                </div>
                <div class="form-row">
                    <textarea-input
                        class="col-md-12"
                        label="Notes"
                        name="notes"
                    ></textarea-input>
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
@endsection()