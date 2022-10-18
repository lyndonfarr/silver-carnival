<template>
    <div class="dropdown ml-auto">
        <a
            aria-expanded="false"
            aria-haspopup="true"
            class="text-success"
            data-toggle="dropdown"
            href=""
            id="myDropdownId"
            title="Add"
            type="button"
        >
            <add-icon></add-icon>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <button
                class="dropdown-item"
                @click="addContactExtra"
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
import AddIcon from '../../Icons/AddIcon.vue';

export default {
    name: 'ContactExtraAddButton',

    components: {
        AddIcon,
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
