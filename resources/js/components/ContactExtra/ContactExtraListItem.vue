<template>
    <li class="list-group-item">
        {{ contactExtra.type | ucfirst }}: {{ contactExtra.value }}
    </li>    
</template>

<script>
import {ucfirst} from '../../filters';

export default {
    name: 'ContactExtraListItem',

    props: {
        contactExtra: {
            required: true,
            type: Object,
        },
    },

    filters: {
        ucfirst,
    },
}
</script>