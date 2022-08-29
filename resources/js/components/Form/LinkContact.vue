<template>
    <div>
        <select name="" id="" class="custom-select">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>
</template>

<script>
export default {
    name: 'LinkContact',

    props: {
        allContacts: {
            required: true,
            type: Array,
        },
        linkedContacts: {
            default: () => ([]),
            required: false,
            type: Array,
        },
    },
}
</script>
