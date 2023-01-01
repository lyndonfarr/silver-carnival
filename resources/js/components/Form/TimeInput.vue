<template>
    <div class="form-group">
        <label :for="name">Time</label>
        <vue-timepicker
            class="d-block w-100"
            format="HH:mm:ss"
            input-class="form-control bg-white"
            input-width="100%"
            :minute-interval="5"
            :name="name"
            placeholder="Time"
            v-model="time"
        ></vue-timepicker>
    </div>
</template>

<script>
import VueTimepicker from 'vue2-timepicker';
import 'vue2-timepicker/dist/VueTimepicker.css';

export default {
    name: 'TimeInput',

    components: {
        VueTimepicker,
    },

    props: {
        name: {
            default: 'time',
            required: false,
            type: String,
        },
        value: {
            default: '00:00:00',
            required: false,
            type: String,
        },
    },

    data() {
        return {
            time: this.value,
        }
    },
}
</script>