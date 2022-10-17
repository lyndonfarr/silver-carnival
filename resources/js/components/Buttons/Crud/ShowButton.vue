<template>
    <a :href="route" title="view">
        <show-icon></show-icon>
    </a>    
</template>

<script>
import ShowIcon from '../../Icons/ShowIcon.vue';

export default {
    name: 'ShowButton',

    components: {
        ShowIcon,
    },

    props: {
        route: {
            required: true,
            type: String,
        },
    },
}
</script>
