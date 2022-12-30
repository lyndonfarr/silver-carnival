<script>
import ApiDestroyButton from '../Buttons/Crud/ApiDestroyButton.vue';
import ContactExtraAddButton from '../Buttons/ContactExtras/ContactExtraAddButton.vue';
import CountryInput from '../Form/CountryInput.vue'
import CreateIcon from '../Icons/CreateIcon.vue';
import DateInput from '../Form/DateInput.vue';
import DestroyIcon from '../Icons/DestroyIcon.vue';
import IndexButton from '../Buttons/Crud/IndexButton.vue';
import SearchIcon from '../Icons/SearchIcon.vue';
import ShowButton from '../Buttons/Crud/ShowButton.vue';
import TextareaInput from '../Form/TextareaInput.vue';
import TextInput from '../Form/TextInput.vue';

export default {
    name: 'ValueStorage',

    components: {
        CreateIcon,
        ApiDestroyButton,
        ContactExtraAddButton,
        CountryInput,
        DateInput,
        DestroyIcon,
        IndexButton,
        SearchIcon,
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