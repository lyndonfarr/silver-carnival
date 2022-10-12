<script>
import ContactFieldListItem from '../Contact/ContactFieldListItem.vue';
import ContactExtraListItem from '../ContactExtra/ContactExtraListItem.vue';

export default {
    name: 'ValueStorage',

    components: {
        ContactExtraListItem,
        ContactFieldListItem,
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