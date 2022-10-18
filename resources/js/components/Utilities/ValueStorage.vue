<script>
import AddIcon from '../Icons/AddIcon.vue';
import ApiDestroyButton from '../Buttons/Crud/ApiDestroyButton.vue';
import ContactExtraAddButton from '../Buttons/ContactExtras/ContactExtraAddButton.vue';
import CountryInput from '../Form/CountryInput.vue'
import DateInput from '../Form/DateInput.vue';
import DestroyIcon from '../Icons/DestroyIcon.vue';
import ShowButton from '../Buttons/Crud/ShowButton.vue';
import TextareaInput from '../Form/TextareaInput.vue';
import TextInput from '../Form/TextInput.vue';

export default {
    name: 'ValueStorage',

    components: {
        AddIcon,
        ApiDestroyButton,
        ContactExtraAddButton,
        CountryInput,
        DateInput,
        DestroyIcon,
        ShowButton,
        TextareaInput,
        TextInput,
    },

    props: {
        defaultStoredValue: {
            required: true,
            type: Object,
        },
        storedValueName: {
            default: 'storedValue',
            required: false,
            type: String,
        },
    },

    data() {
        return {
            [this.storedValueName]: Object.assign({}, this.defaultStoredValue),
        }
    },
}
</script>