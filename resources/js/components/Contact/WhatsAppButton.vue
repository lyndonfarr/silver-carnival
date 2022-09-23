<template>
    <a :href="link" class="" target="_blank">Whatsapp</a>
</template>

<script>
export default {
    name: 'WhatsAppButton',

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
