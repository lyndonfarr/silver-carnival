<template>
    <div class="form-group">
        <label
            :for="name"
            v-if="!noLabel"
            v-text="label"
        ></label>
        <input
            type="text"
            class="form-control"
            :id="name"
            @input="emitInput"
            :name="name"
            :placeholder="label"
            :value="value"
        >
    </div>
</template>

<script>
export default {
    name: 'TextInput',

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
        value: {
            default: '',
            required: false,
            type: String,
        },
    },

    methods: {
        emitInput(e) {
            this.$emit('input', e.target.value);
        },
    },
}
</script>
