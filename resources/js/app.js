require('./bootstrap');

window.Vue = require('vue');

import NationalityInput from './components/Form/NationalityInput.vue';
import TextareaInput from './components/Form/TextareaInput.vue';
import TextInput from './components/Form/TextInput.vue';

const app = new Vue({
    el: '#app',

    components: {
        NationalityInput,
        TextareaInput,
        TextInput,
    },
});
