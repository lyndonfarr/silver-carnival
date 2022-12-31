<template>
    <div class="form-group">
        <label for="">Time</label>
        <vue-timepicker
            class="d-block w-100"
            input-class="form-control w-100 bg-white"
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
}
</script>