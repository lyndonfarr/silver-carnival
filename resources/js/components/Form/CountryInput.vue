<template>
    <div class="form-group col-md-4">
        <label
            :for="`country_input_${name}`"
            v-text="label"
        ></label>
        <select
            class="form-control"
            :id="`country_input_${name}`"
            v-model="country"
        >
            <option
                v-for="country in countries"
                :key="country"
                v-text="country"
            ></option>
        </select>
        <input
            type="text"
            hidden
            :name="name"
            :value="country"
        >
    </div>
</template>

<script>
export default {
    props: {
        label: {
            required: true,
            type: String,
        },
        name: {
            required: true,
            type: String,
        },
        value: {
            default: '',
            required: false,
            type: String,
        },
    },
    data() {
        return {
            countries: [],
            country: `${this.value}`,
        }
    },
    created() {
        axios
            .get(`https://restcountries.com/v3.1/all?fields=name`)
            .then(response => this.countries = response.data.map(country => country.name.common).sort())
            .catch(error => console.error(error))
        ;
    },
}
</script>
