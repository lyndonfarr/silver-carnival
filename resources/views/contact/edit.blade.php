@extends('layouts.contact')

@section('contactContent')
<value-storage
    inline-template
    :default-stored-value="{
        contact: {{ $contact }},
        newContactExtras: [],
    }"
>
    <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
    @csrf
    @method('PATCH')
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
                <span v-if="storedValue.contact.contact_extras.length || storedValue.newContactExtras.length">Edit ContactExtras</span>
                <span v-else>Create ContactExtras</span>
                <contact-extra-add-button
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

        <button class="btn btn-primary btn-block">Save</button>
    </form>
</value-storage>
@endsection