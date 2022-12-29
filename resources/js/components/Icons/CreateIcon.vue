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
        <line x1="12" y1="5" x2="12" y2="19"></line>
        <line x1="5" y1="12" x2="19" y2="12"></line>
    </svg>
</template>

<script>
export default {
    name: 'CreateIcon',

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