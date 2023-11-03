<template>
    <button @click="test"></button>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
        }
    },

    mounted() {

    },

    methods: {
        test () {
            axios.get('/api/create')
                .then(response => {
                    console.log("works")
                    console.log(response)
                })
                .catch(error => {
                    console.log("error")
                    console.log(error)
                })
        }
    }
}

</script>
