@extends('layouts.contact')

@section('contactContent')
<value-storage :default-stored-value="{contact: {{ $contact }}}" inline-template>
    <div class="card mb-4">
        <div
            class="card-header"
            v-text="storedValue.contact.full_name"
        ></div>
            <ul class="list-group list-group-flush">
                <contact-field-list-item
                    :contact-id="storedValue.contact.id"
                    field-name="full_name"
                    label="Name"
                    v-model="storedValue.contact.full_name"
                ></contact-field-list-item>
                <contact-field-list-item
                    :contact-id="storedValue.contact.id"
                    field-name="nickname"
                    label="AKA"
                    v-model="storedValue.contact.nickname"
                ></contact-field-list-item>
                @if ($contact->nickname)
                    <li class="list-group-item">AKA: {{ $contact->nickname }}</li>
                @endif
                @if ($contact->dob)
                    <li class="list-group-item">Age: {{ $contact->age }}</li>
                @endif
                <li class="list-group-item">Born: {{ $contact->dob }}</li>
                <li class="list-group-item">Nationality: {{ $contact->nationality }}</li>
                <li class="list-group-item">Notes: {{ $contact->notes }}</li>

                @foreach ($contact->contactExtras as $contactExtra)
                    <contact-extra-list-item
                        :contact-extra="{{ $contactExtra }}"
                        edit-route="{{ route('contact-extras.edit', $contactExtra->id) }}"
                    ></contact-extra-list-item>
                @endforeach
            </ul>
    </div>
</value-storage>
@endsection