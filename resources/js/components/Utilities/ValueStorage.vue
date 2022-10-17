<script>
import AddIcon from '../Icons/AddIcon.vue';
import ContactExtraAddButton from '../Buttons/ContactExtras/ContactExtraAddButton.vue';
import CountryInput from '../Form/CountryInput.vue'
import DateInput from '../Form/DateInput.vue';
import ShowButton from '../Buttons/Crud/ShowButton.vue';
import TextareaInput from '../Form/TextareaInput.vue';
import TextInput from '../Form/TextInput.vue';

export default {
    name: 'ValueStorage',

    components: {
        AddIcon,
        ContactExtraAddButton,
        CountryInput,
        DateInput,
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
            [this.storedValueName]: {...this.defaultStoredValue},
        }
    },
}
</script>