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
        <circle cx="11" cy="11" r="8"></circle>
        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
    </svg>
</template>

<script>
export default {
    name: 'SearchIcon',

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
