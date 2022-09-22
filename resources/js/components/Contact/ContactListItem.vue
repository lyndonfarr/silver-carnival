<template>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    {{ contact.first_name }}
    <span class="badge badge-primary badge-pill" v-if="contact.phone">
        <whats-app-button
            :phone-number="contact.phone"
        ></whats-app-button>
    </span>
  </li>
</template>

<script>
import WhatsAppButton from './WhatsAppButton.vue';

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
    },
}
</script>
