<template>
    <li class="list-group-item flex-column align-items-start">
        <p class="mb-0">{{ `${address.line_1},` }}{{ address.line_2 ? ` ${address.line_2},` : '' }}</p>
        <p class="mb-0">{{ `${address.city},` }}{{ address.state ? ` ${address.state}` : '' }}</p>
        <p class="mb-0">{{ address.post_code }}</p>
        <p class="mb-0">{{ address.country }}</p>
    </li>
</template>

<script>
export default {
    name: 'AddressListItemShow',

    props: {
        address: {
            required: true,
            type: Object,
        },
    },
}
</script>
