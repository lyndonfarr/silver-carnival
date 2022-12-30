@extends('layouts.contact')

@section('contactContent')
<value-storage
    inline-template
    :default-stored-value="{
        addressFinderOpened: false,
        allAddresses: {{ $addresses }},
        allContacts: {{ $contacts }},
        contact: {{ $contact }},
        newAddresses: [],
        foundAddresses: [],
        newContactExtras: [],
    }"
>
    <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
    @csrf
    @method('PATCH')
        <div class="card my-4">
            <div class="card-header">Edit Contact</div>
            <div class="card-body">
                <text-input
                    label="Name"
                    name="full_name"
                    v-model="storedValue.contact.full_name"
                ></text-input>
                <text-input
                    label="AKA"
                    name="nickname"
                    v-model="storedValue.contact.nickname"
                ></text-input>
                <date-input
                    label="DoB"
                    name="dob"
                    v-model="storedValue.contact.dob"
                ></date-input>
                <country-input
                    label="Nationality"
                    name="nationality"
                    v-model="storedValue.contact.nationality"
                ></country-input>
                <textarea-input
                    label="Notes"
                    name="notes"
                    v-model="storedValue.contact.notes"
                ></textarea-input>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header d-flex">
                <span>ContactExtras</span>
                <contact-extra-add-button
                    class="ml-auto"
                    @input="e => storedValue.newContactExtras = [...storedValue.newContactExtras, {type: e, value: '', key: storedValue.newContactExtras.length}]"
                ></contact-extra-add-button>
            </div>
            <div class="card-body" v-if="storedValue.contact.contact_extras.length || storedValue.newContactExtras.length">
                <div v-for="(existingContactExtra, index) in storedValue.contact.contact_extras">
                    <text-input
                        :key="existingContactExtra.id"
                        :label="existingContactExtra.type"
                        :name="`contact_extras[${index}][value]`"
                        v-model="storedValue.contact.contact_extras[index].value"
                    >
                        <template v-slot:buttons>
                            <api-destroy-button
                                class="ml-2"
                                @destroyed="e => storedValue.contact.contact_extras = [...storedValue.contact.contact_extras.slice(0, index), ...storedValue.contact.contact_extras.slice(index + 1, storedValue.contact.contact_extras.length)]"
                                :endpoint="`/api/contact-extras/${existingContactExtra.id}`"
                            ></api-destroy-button>
                        </template>
                    </text-input>
                    <input
                        class="d-none"
                        :name="`contact_extras[${index}][id]`"
                        type="text"
                        :value="existingContactExtra.id"
                    >
                </div>
                <div v-for="(newContactExtra, index) in storedValue.newContactExtras">
                    <text-input
                        :key="`new-contact-extra-${newContactExtra.key}`"
                        :label="newContactExtra.type"
                        :name="`new_contact_extras[${newContactExtra.key}][value]`"
                        v-model="storedValue.newContactExtras[index].value"
                    >
                        <template v-slot:buttons>
                            <a
                                class="d-flex align-items-center text-danger ml-2"
                                @click="e => storedValue.newContactExtras = [...storedValue.newContactExtras.slice(0, index), ...storedValue.newContactExtras.slice(index + 1, storedValue.newContactExtras.length)]"
                                style="cursor: pointer;"
                            >
                                <destroy-icon></destroy-icon>
                            </a>
                        </template>
                    </text-input>
                    <input
                        class="d-none"
                        :name="`new_contact_extras[${newContactExtra.key}][type]`"
                        type="text"
                        :value="newContactExtra.type"
                    >
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header d-flex">
                <span>Addresses</span>
                <a class="ml-auto text-success" @click.prevent="e => storedValue.newAddresses = [...storedValue.newAddresses, {city: '', country: '', line_1: '', line_2: '', linked_contacts: [], post_code: '', state: '', key: storedValue.newAddresses.length}]" href="">
                    <create-icon></create-icon>
                </a>
                <a href="" class="ml-2 text-success" @click.prevent="e => storedValue.addressFinderOpened = true">
                    <search-icon></search-icon>
                </a>
            </div>
            <ul class="list-group list-group-flush" v-if="storedValue.contact.addresses.length || storedValue.newAddresses.length">
                <li class="list-group-item d-flex align-items-start" v-for="(address, index) in storedValue.contact.addresses">
                    <p class="mb-0">@{{ address.full_string }}</p>
                    <api-destroy-button
                        class="ml-auto"
                        @destroyed="e => storedValue.contact.addresses = [...storedValue.contact.addresses.slice(0, index), ...storedValue.contact.addresses.slice(index + 1, storedValue.contact.addresses.length)]"
                        :endpoint="`/api/address-contact/${address.id}/${storedValue.contact.id}`"
                    ></api-destroy-button>
                </li>
                <li class="list-group-item d-flex align-items-start" v-for="(newAddress, index) in storedValue.newAddresses">
                    <div class="w-100">
                        <div class="form-row">
                            <text-input
                                class="col-md-4"
                                label="Line 1"
                                :name="`new_addresses[${newAddress.key}][line_1]`"
                                v-model="storedValue.newAddresses[index].line_1"
                            ></text-input>
                            <text-input
                                class="col-md-4"
                                label="Line 2"
                                :name="`new_addresses[${newAddress.key}][line_2]`"
                                v-model="storedValue.newAddresses[index].line_2"
                            ></text-input>
                            <text-input
                                class="col-md-4"
                                label="City"
                                :name="`new_addresses[${newAddress.key}][city]`"
                                v-model="storedValue.newAddresses[index].city"
                            ></text-input>
                        </div>
                        <div class="form-row">
                            <text-input
                                class="col-md-4"
                                label="State"
                                :name="`new_addresses[${newAddress.key}][state]`"
                                v-model="storedValue.newAddresses[index].state"
                            ></text-input>
                            <text-input
                                class="col-md-4"
                                label="Country"
                                :name="`new_addresses[${newAddress.key}][country]`"
                                v-model="storedValue.newAddresses[index].country"
                            ></text-input>
                            <text-input
                                class="col-md-4"
                                label="Post Code"
                                :name="`new_addresses[${newAddress.key}][post_code]`"
                                v-model="storedValue.newAddresses[index].post_code"
                            ></text-input>
                        </div>
                    </div>
                    <a
                        class="d-flex align-items-center text-danger ml-2"
                        @click="e => storedValue.newAddresses = [...storedValue.newAddresses.slice(0, index), ...storedValue.newAddresses.slice(index + 1, storedValue.newAddresses.length)]"
                        style="cursor: pointer;"
                    >
                        <destroy-icon></destroy-icon>
                    </a>
                </li>
            </ul>
            <div class="card-body" v-if="storedValue.addressFinderOpened">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="typo__label" for="found_address_id">Find Addresses</label>
                            <multiselect
                                :allow-empty="false"
                                :clear-on-select="false"
                                :hide-selected="true"
                                id="found_address_id"
                                label="address"
                                :multiple="true"
                                :options="storedValue.allAddresses"
                                placeholder="Find Addresses"
                                track-by="id"
                                v-model="storedValue.foundAddresses"
                            ></multiselect>
                            <input
                                hidden
                                :key="foundAddress.id"
                                name="found_address_id[]"
                                :value="foundAddress.id"
                                v-for="foundAddress in storedValue.foundAddresses"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-primary btn-block">Save</button>
    </form>
</value-storage>
@endsection