<template>
    <a
        class=""
        :href="link"
        target="_blank"
        :title="`Instagram ${instagram}`"
    >
        <instagram-icon></instagram-icon>
    </a>
</template>

<script>
import InstagramIcon from '../../Icons/InstagramIcon.vue';

export default {
    name: 'InstagramButton',

    components: {
        InstagramIcon,
    },

    props: {
        instagram: {
            required: true,
            type: String,
        },
    },

    computed: {
        link() {
            return process.env.MIX_INSTAGRAM_LINK + this.instagram;
        },
    },
}
</script>
