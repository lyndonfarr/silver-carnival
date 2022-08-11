<template>
    <div class="form-group col-md-4">
        <label
            :for="name"
            v-text="label"
        ></label>
        <select
            :id="name"
            :name="name"
            class="form-control"
        >
            <option selected>Select {{ label }}</option>
            <option
                v-for="country in countries"
                :key="country"
                v-text="country"
            ></option>
        </select>
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
    },
    data() {
        return {
            countries: [],
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
