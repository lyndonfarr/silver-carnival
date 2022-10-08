<template>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Name: {{ contact.full_name }}</li>
        <li class="list-group-item" v-if="contact.nickname">AKA: {{ contact.nickname }}</li>
        <li class="list-group-item" v-if="contact.dob">Age: {{ contact.age }}</li>
        <li class="list-group-item">Born: {{ contact.dob }}</li>
        <li class="list-group-item">Nationality: {{ contact.nationality }}</li>
        <li class="list-group-item">Notes: {{ contact.notes }}</li>
    </ul>    
</template>

<script>
export default {
    name: 'ContactShow',

    props: {
        contact: {
            required: true,
            type: Object,
        },
    },
}
</script>