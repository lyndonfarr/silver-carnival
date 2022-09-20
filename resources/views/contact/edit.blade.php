@extends('layouts.app')

@section('content')
    <form method="POST" action="{{url('contacts')}}">
        @csrf
        <div class="card">
            <div class="card-header">Create Contact</div>
            <div class="card-body">
                <div class="form-row">
                    <text-input
                        class="col-md-4"
                        label="First Name"
                        name="first_name"
                        value="{{ $contact->first_name }}"
                    ></text-input>
                    <text-input
                        class="col-md-4"
                        label="Middle Names"
                        name="middle_names"
                        value="{{ $contact->middle_names }}"
                    ></text-input>
                    <text-input
                        class="col-md-4"
                        label="Last Name"
                        name="last_name"
                        value="{{ $contact->last_name }}"
                    ></text-input>
                </div>
                <div class="form-row">
                    <textarea-input
                        class="col-md-5"
                        label="Description"
                        name="description"
                        value="{{ $contact->description }}"
                    ></textarea-input>
                    <textarea-input
                        class="col-md-7"
                        label="Notes"
                        name="notes"
                        value="{{ $contact->notes }}"
                    ></textarea-input>
                </div>
                <div class="form-row">
                    <country-input
                        label="Nationality"
                        name="nationality"
                    ></country-input>
                    <text-input
                        class="col-md-4"
                        label="Nickname"
                        name="nickname"
                        value="{{ $contact->nickname }}"
                    ></text-input>
                    <date-input
                        class="col-md-4"
                        label="Date of Birth"
                        name="dob"
                    ></date-input>
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