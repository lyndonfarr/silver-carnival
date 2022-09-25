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
        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
        <line x1="16" y1="2" x2="16" y2="6"></line>
        <line x1="8" y1="2" x2="8" y2="6"></line>
        <line x1="3" y1="10" x2="21" y2="10"></line>
    </svg>
</template>

<script>
export default {
    name: 'CalendarIcon',

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
