<template>
    <div class="form-group">
        <label
            :for="name"
            v-text="label"
        ></label>
        <b-form-datepicker
            :id="name"
            :name="name"
            v-model="date"
        ></b-form-datepicker>
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
        value: {
            default: '',
            required: false,
            type: String,
        },
    },

    data() {
        return {
            date: this.value,
        }
    },

    watch: {
        date(newVal) {
            this.$emit('input', newVal);
        },
    },
}
</script>