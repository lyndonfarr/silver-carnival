require('./bootstrap');

window.Vue = require('vue');

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


import CountryInput from './components/Form/CountryInput.vue';
import DateInput from './components/Form/DateInput.vue';
import TextareaInput from './components/Form/TextareaInput.vue';
import TextInput from './components/Form/TextInput.vue';

const app = new Vue({
    el: '#app',

    components: {
        CountryInput,
        DateInput,
        TextareaInput,
        TextInput,
    },
});
