require('./bootstrap');

window.Vue = require('vue');

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

import Multiselect from 'vue-multiselect';

import BsNavPill from './components/BootstrapOverrides/Nav/NavPill.vue';

import InstagramButton from './components/Buttons/ContactExtras/InstagramButton.vue';
import WhatsAppButton from './components/Buttons/ContactExtras/WhatsAppButton.vue';

import CreateButton from './components/Buttons/Crud/CreateButton.vue';
import EditButton from './components/Buttons/Crud/EditButton.vue';
import IndexButton from './components/Buttons/Crud/IndexButton.vue';
import ShowButton from './components/Buttons/Crud/ShowButton.vue';

import ContactFieldListItem from './components/Contact/ContactFieldListItem.vue';

import ContactExtraListItem from './components/ContactExtra/ContactExtraListItem.vue';

import CountryInput from './components/Form/CountryInput.vue';
import DateInput from './components/Form/DateInput.vue';
import PhoneInput from './components/Form/PhoneInput.vue';
import TextareaInput from './components/Form/TextareaInput.vue';
import TextInput from './components/Form/TextInput.vue';

import CalendarIcon from './components/Icons/CalendarIcon.vue';
import SearchIcon from './components/Icons/SearchIcon.vue';

import ValueStorage from './components/Utilities/ValueStorage.vue';
import Vue from 'vue';


Vue.component('multiselect', Multiselect);


const app = new Vue({
    el: '#app',

    components: {
        BsNavPill,
        CalendarIcon,
        ContactFieldListItem,
        ContactExtraListItem,
        CountryInput,
        CreateButton,
        DateInput,
        EditButton,
        IndexButton,
        InstagramButton,
        PhoneInput,
        SearchIcon,
        ShowButton,
        TextareaInput,
        TextInput,
        ValueStorage,
        WhatsAppButton,
    },
});