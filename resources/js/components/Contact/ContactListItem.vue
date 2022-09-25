<template>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <a :href="showRoute" v-text="contact.full_name"></a>
    <span>
        <whats-app-button
            :phone-number="contact.primary_phone_number.value"
            v-if="contact.primary_phone_number"
        ></whats-app-button>
    </span>
  </li>
</template>

<script>
import WhatsAppButton from '../Buttons/ContactExtras/WhatsAppButton.vue';

export default {
    name: 'ContactListItem',

    components: {
        WhatsAppButton,
    },

    props: {
        contact: {
            required: true,
            type: Object,
        },
        showRoute: {
            required: true,
            type: String,
        },
    },
}
</script>
