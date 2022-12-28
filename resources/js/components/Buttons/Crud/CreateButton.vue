<template>
    <a :href="route" title="Create">
        <create-icon></create-icon>
    </a>
</template>

<script>
import CreateIcon from '../../Icons/CreateIcon.vue';
export default {
    name: 'CreateButton',

    components: {
        CreateIcon,
    },

    props: {
        route: {
            required: true,
            type: String,
        },
    },
}
</script>
