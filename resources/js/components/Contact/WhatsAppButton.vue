<template>
    <a :href="`${process.env.WHATSAPP_API_STRING}${phoneNumber}`" class=""></a>
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
}
</script>
