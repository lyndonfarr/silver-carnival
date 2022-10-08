<template>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span>{{ contactExtra.type | ucfirst }}: {{ contactExtra.value }}</span>
        <edit-button :route="editRoute"></edit-button>
    </li>    
</template>

<script>
import {ucfirst} from '../../filters';
import EditButton from '../Buttons/Crud/EditButton.vue';

export default {
    name: 'ContactExtraListItem',

    components: {
        EditButton,
    },

    props: {
        contactExtra: {
            required: true,
            type: Object,
        },
        editRoute: {
            required: true,
            type: String,
        },
    },

    filters: {
        ucfirst,
    },
}
</script>