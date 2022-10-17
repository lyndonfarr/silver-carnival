<template>
    <a :href="route" title="Edit">
        <edit-icon></edit-icon>
    </a>
</template>

<script>
import EditIcon from '../../Icons/EditIcon.vue';
export default {
    name: 'EditButton',

    components: {
        EditIcon,
    },

    props: {
        route: {
            required: true,
            type: String,
        },
    },
}
</script>
