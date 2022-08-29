require('./bootstrap');

window.Vue = require('vue');

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

import Multiselect from 'vue-multiselect';

import CountryInput from './components/Form/CountryInput.vue';
import DateInput from './components/Form/DateInput.vue';
import TextareaInput from './components/Form/TextareaInput.vue';
import TextInput from './components/Form/TextInput.vue';

import ValueStorage from './components/Utilities/ValueStorage.vue';
import Vue from 'vue';


Vue.component('multiselect', Multiselect);


const app = new Vue({
    el: '#app',

    components: {
        CountryInput,
        DateInput,
        TextareaInput,
        TextInput,
        ValueStorage,
    },
});