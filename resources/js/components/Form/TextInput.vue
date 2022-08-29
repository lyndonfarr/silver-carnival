<template>
    <div class="form-group">
        <label
            :for="name"
            v-text="label"
        ></label>
        <input
            type="text"
            class="form-control"
            :id="name"
            :name="name"
            :placeholder="label"
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
    },
}
</script>
