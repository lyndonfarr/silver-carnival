<template>
    <div class="form-group">
        <label
            :for="name"
            v-if="!noLabel"
            v-text="label"
        ></label>
        <textarea
            class="form-control"
            :id="name"
            @input="emitInput"
            :name="name"
            :placeholder="label"
            :value="value"
        ></textarea>
    </div>
</template>

<script>
export default {
    name: 'TextareaInput',

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
