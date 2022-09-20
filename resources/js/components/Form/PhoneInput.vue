<template>
    <div class="form-group">
        <label
            :for="name"
            v-if="!noLabel"
            v-text="label"
        ></label>
        <input
            type="tel"
            class="form-control"
            :id="name"
            :name="name"
            :placeholder="label"
        >
    </div>
</template>

<script>
export default {
    name: 'PhoneInput',

    props: {
        label: {
            required: true,
            type: String,
        },
        name: {
            required: true,
            type: String,
        },
        noLabel: {
            default: false,
            required: false,
            type: Boolean,
        },
    },

    data() {
        return {

        }
    },
}
</script>
