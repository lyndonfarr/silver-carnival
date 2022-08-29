<script>
export default {
    name: 'ValueStorage',

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