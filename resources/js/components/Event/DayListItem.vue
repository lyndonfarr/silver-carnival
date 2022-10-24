<template>
    <div class="card mb-4">
        <div class="card-header">
            
        </div>
    </div>
</template>

<script>
export default {
    name: 'DayListItem',

    props: {
        day: {
            required: true,
            type: String,
        },
        events: {
            required: true,
            type: Array,
        },
    },

    created() {
        console.log('here');
    },
}
</script>