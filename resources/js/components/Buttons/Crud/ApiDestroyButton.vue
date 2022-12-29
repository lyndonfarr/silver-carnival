<template>
    <a
        class="d-flex align-items-center text-danger"
        @click="destroy"
        style="cursor: pointer;"
        title="Destroy"
    >
        <destroy-icon></destroy-icon>
    </a>
</template>

<script>
import DestroyIcon from '../../Icons/DestroyIcon.vue';
export default {
    name: 'DestroyButton',

    components: {
        DestroyIcon,
    },

    props: {
        endpoint: {
            required: true,
            type: String,
        },
    },

    methods: {
        destroy() {
            if (!confirm('You are about to remove an entry from the database. Are you sure you want to do this?')) {
                return;
            }
            
            axios
                .delete(this.endpoint)
                .then(res => this.$emit('destroyed'))
                .catch(err => console.log(err))
            ;
        },
    },
}
</script>
