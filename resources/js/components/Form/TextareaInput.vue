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
            :name="name"
            :placeholder="label"
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
    },
}
</script>
