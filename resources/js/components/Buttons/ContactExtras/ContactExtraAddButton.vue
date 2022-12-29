<template>
    <div class="dropdown">
        <create-button
            aria-expanded="false"
            aria-haspopup="true"
            class="text-success"
            data-toggle="dropdown"
            route=""
            id="myDropdownId"
            title="Create"
            type="button"
        ></create-button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <button
                class="dropdown-item"
                @click.prevent="addContactExtra"
                :key="contactExtraType"
                :value="contactExtraType"
                v-for="contactExtraType in contactExtraTypes"
            >
                {{ contactExtraType | ucfirst }}
            </button>
        </div>
    </div>
</template>

<script>
import {ContactExtraTypes} from '../../../config';
import {ucfirst} from '../../../filters';
import CreateIcon from '../../Icons/CreateIcon.vue';
import CreateButton from '../Crud/CreateButton.vue';

export default {
    name: 'ContactExtraAddButton',

    components: {
        CreateButton,
        CreateIcon,
    },

    filters: {
        ucfirst,
    },

    data() {
        return {
            contactExtraTypes: ContactExtraTypes,
        }
    },

    methods: {
        addContactExtra(e) {
            this.$emit('input', e.target.value);
        },
    },
}
</script>
