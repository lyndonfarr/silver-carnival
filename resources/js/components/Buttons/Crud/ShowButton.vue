<template>
    <a :href="route" title="view">
        <svg
            viewBox="0 0 24 24"
            width="24"
            height="24"
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
    </a>    
</template>

<script>
export default {
    name: 'ShowButton',

    props: {
        route: {
            required: true,
            type: String,
        },
    },
}
</script>
