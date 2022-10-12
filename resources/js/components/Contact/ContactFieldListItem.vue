<template>
    <li class="list-group-item">
        <form
            class="form-inline"
            @click.self="toggleEdit"
            @submit.prevent
            v-if="edit"
        >
            <div class="form-group">
                <label :for="fieldName">{{ label }}:</label>
                <input
                    @blur="updateField"
                    class="form-control mx-sm-3"
                    :id="fieldName"
                    type="text"
                    :value="value || ''"
                >
            </div>
        </form>
        <span v-else @click="toggleEdit">{{ label }}: {{ value }}</span>
    </li>
</template>

<script>
export default {
    name: 'ContactFieldListItem',

    props: {
        contactId: {
            required: true,
            type: Number,
        },
        fieldName: {
            required: true,
            type: String,
        },
        label: {
            required: false,
            type: String,
        },
        value: {
            required: true,
            validator(val) {
                return val === null || typeof(val) === 'string';
            },
        },
    },

    data() {
        return {
            edit: false,
        }
    },

    methods: {
        toggleEdit() {
            Object.assign(this, {edit: !this.edit});
        },
        updateField(e) {
            axios
                .post(`/api/contacts/edit-field/${this.contactId}`, {
                    field_name: this.fieldName,
                    value: e.target.value,
                })
                .then(res => {
                    res.data[this.fieldName];
                    this.$emit('input', res.data[this.fieldName]);
                })
                .catch(err => console.log(err));
        },
    },
}
</script>