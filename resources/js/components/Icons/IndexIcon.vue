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
        <line x1="8" y1="6" x2="21" y2="6"></line>
        <line x1="8" y1="12" x2="21" y2="12"></line>
        <line x1="8" y1="18" x2="21" y2="18"></line>
        <line x1="3" y1="6" x2="3.01" y2="6"></line>
        <line x1="3" y1="12" x2="3.01" y2="12"></line>
        <line x1="3" y1="18" x2="3.01" y2="18"></line>
    </svg>
</template>

<script>
export default {
    name: 'IndexIcon',

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
