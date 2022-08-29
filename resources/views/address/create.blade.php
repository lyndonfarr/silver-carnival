@extends('layouts.app')

@section('content')
    <form method="POST" action="{{url('addresses')}}">
        @csrf
        <div class="card">
            <div class="card-header">Create Address</div>
            <div class="card-body">
                <div class="form-row">
                    <text-input
                        class="col-md-4"
                        label="Line 1"
                        name="line_1"
                    ></text-input>
                    <text-input
                        class="col-md-4"
                        label="Line 2"
                        name="line_2"
                    ></text-input>
                    <text-input
                        class="col-md-4"
                        label="City"
                        name="city"
                    ></text-input>
                </div>
                <div class="form-row">
                    <text-input
                        class="col-md-4"
                        label="State"
                        name="state"
                    ></text-input>
                    <text-input
                        class="col-md-4"
                        label="Country"
                        name="country"
                    ></text-input>
                    <text-input
                        class="col-md-4"
                        label="Post Code"
                        name="post_code"
                    ></text-input>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="typo__label" for="contact_id">Link with Contacts</label>
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