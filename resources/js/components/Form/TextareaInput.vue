<template>
    <div class="form-group">
        <label
            :for="name"
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
