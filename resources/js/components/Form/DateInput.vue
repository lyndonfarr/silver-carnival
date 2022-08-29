<template>
    <div class="form-group">
        <label
            :for="name"
            v-text="label"
        ></label>
        <b-form-datepicker
            :id="name"
            v-model="date"
        ></b-form-datepicker>
        <input
            hidden
            :name="name"
            type="text"
        >
    </div>
</template>

<script>
import { BFormDatepicker } from 'bootstrap-vue';

export default {
    name: 'DateInput',

    components: {
        BFormDatepicker,
    },

    props: {
        label: {
            required: true,
            type: String,
        },
        name: {
            required: true,
            type: String,
        },
    },

    data() {
        return {
            date: '',
        }
    },
}
</script>