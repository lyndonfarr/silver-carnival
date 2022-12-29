@extends('layouts.address')

@section('addressContent')
    <form method="POST" action="{{ route('addresses.update', $address->id) }}">
        @csrf
        @method('PATCH')
        <div class="card mb-4">
            <div class="card-header">Edit Address</div>
            <div class="card-body">
                <div class="form-row">
                    <text-input
                        class="col-md-4"
                        label="Line 1"
                        name="line_1"
                        value="{{ $address->line_1 }}"
                    ></text-input>
                    <text-input
                        class="col-md-4"
                        label="Line 2"
                        name="line_2"
                        value="{{ $address->line_2 }}"
                    ></text-input>
                    <text-input
                        class="col-md-4"
                        label="City"
                        name="city"
                        value="{{ $address->city }}"
                    ></text-input>
                </div>
                <div class="form-row">
                    <text-input
                        class="col-md-4"
                        label="State"
                        name="state"
                        value="{{ $address->state }}"
                    ></text-input>
                    <text-input
                        class="col-md-4"
                        label="Country"
                        name="country"
                        value="{{ $address->country }}"
                    ></text-input>
                    <text-input
                        class="col-md-4"
                        label="Post Code"
                        name="post_code"
                        value="{{ $address->post_code }}"
                    ></text-input>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="typo__label" for="contact_id">Contacts</label>
                            <value-storage
                                :default-stored-value="{
                                    allContacts: {{ $contacts }},
                                    linkedContacts: {{ $linkedContacts }},
                                }"
                                inline-template
                            >
                                <div>
                                    <multiselect
                                        :allow-empty="false"
                                        :clear-on-select="false"
                                        :hide-selected="true"
                                        id="contact_id"
                                        label="name"
                                        :multiple="true"
                                        :options="storedValue.allContacts"
                                        placeholder="Link with Contacts"
                                        track-by="id"
                                        v-model="storedValue.linkedContacts"
                                    ></multiselect>
                                    <input
                                        hidden
                                        :key="linkedContact.id"
                                        name="contact_id[]"
                                        :value="linkedContact.id"
                                        v-for="linkedContact in storedValue.linkedContacts"
                                    >
                                </div>
                            </value-storage>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button
            type="submit"
            class="btn btn-primary btn-block"
        >
            Save
        </button>
    </form>
@endsection