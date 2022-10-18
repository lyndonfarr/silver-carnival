@extends('layouts.contact')

@section('contactContent')
<value-storage
    inline-template
    :default-stored-value="{
        contact: {{ $contact }},
        newContactExtras: [],
    }"
>
    <div>
        <div class="card my-4">
            <div class="card-header d-flex">
                Edit Contact
                <show-button
                    class="ml-auto"
                    route="{{ route('contacts.show', $contact->id) }}"
                ></show-button>
            </div>
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
                    v-model="storedValue.contact.nickname"
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
                Edit ContactExtras
                <contact-extra-add-button
                    @input="e => storedValue.newContactExtras = [...storedValue.newContactExtras, {type: e, value: '', key: storedValue.newContactExtras.length}]"
                ></contact-extra-add-button>
            </div>
            <div class="card-body">
                <text-input
                    :key="contactExtra.id"
                    :label="contactExtra.type"
                    :name="`contact_extras[${contactExtra.id}][value]`"
                    v-for="(contactExtra, index) in storedValue.contact.contact_extras"
                    v-model="storedValue.contact.contact_extras[index].value"
                >
                    <template v-slot:buttons>
                        <api-destroy-button
                            class="ml-2"
                            :endpoint="`/api/contact-extras/${contactExtra.id}`"
                        ></api-destroy-button>
                    </template>
                </text-input>
                <text-input
                    :key="`new-contact-extra-${newContactExtra.key}`"
                    :label="newContactExtra.type"
                    :name="`contact_extras[${newContactExtra.key}][value]`"
                    v-for="(newContactExtra, index) in storedValue.newContactExtras"
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
            </div>
        </div>

        <button class="btn btn-primary btn-block">Save</button>
    </div>
</value-storage>
@endsection