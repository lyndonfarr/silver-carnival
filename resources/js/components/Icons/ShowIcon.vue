<template>
    <svg
        viewBox="0 0 24 24"
        :width="width"
        :height="height"
        stroke="currentColor"
        stroke-width="2"
        fill="none"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="css-i6dzq1"
    >
        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
        <circle cx="12" cy="12" r="3"></circle>
    </svg>
</template>

<script>
export default {
    name: 'ShowIcon',

    props: {
        height: {
            default: 24,
            required: false,
            type: Number,
        },
        width: {
            default: 24,
            required: false,
            type: Number,
        },
    },
}
</script>