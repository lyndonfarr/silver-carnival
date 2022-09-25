<template>
    <a
        class=""
        :href="link"
        target="_blank"
        :title="`WhatsApp ${this.phoneNumber}`"
    >
        <message-icon></message-icon>
    </a>
</template>

<script>
import MessageIcon from '../../Icons/MessageIcon.vue';

export default {
    name: 'WhatsAppButton',

    components: {
        MessageIcon,
    },

    props: {
        phoneNumber: {
            required: true,
            type: String,
        },
    },

    computed: {
        link() {
            return process.env.MIX_WHATSAPP_API_STRING + this.phoneNumber;
        },
    },
}
</script>
