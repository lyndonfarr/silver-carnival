<template>
    <a :href="route" title="Index">
        <index-icon></index-icon>
    </a>
</template>

<script>
import IndexIcon from '../../Icons/IndexIcon.vue';
export default {
    name: 'IndexButton',

    components: {
        IndexIcon,
    },

    props: {
        route: {
            required: true,
            type: String,
        },
    },
}
</script>
