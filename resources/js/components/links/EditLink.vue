<template>
    <div class="container mt-5">
        <h2>Edit link.</h2>
        <div class="bigCard p-3">
            <form>
                <input v-model="linkPost.links" class="form-control"><br>
                <textarea v-model="linkPost.body" class="form-control"></textarea>


            </form>
            <p @click="updateLink" class="text-primary mt-4" style="cursor: pointer">Update</p>
        </div>
        <div class="alert alert-danger" role="alert" v-if="error">
            <p>Please fill in the form correctly.</p>
        </div>

    </div>
</template>

<script>
import axios from "axios";

export default {
    data(){
        return {
            linkPost: [],
            error: false
        }
    },

    mounted() {
        axios.get(`/api/show/`+this.$route.params.id + `/link`)
            .then(response => {
                this.linkPost = response.data.link;
                console.log(this.blogPost)
            })
            .catch(error => {
                console.error(error);
            });
    },

    methods: {
        updateLink(){
            axios.put(`/api/update/link/${this.$route.params.id}`, this.linkPost)
                .then(response => {
                    console.log("success", response)
                    this.$router.push("/links");
                })
                .catch(error => {
                    this.error = true
                    console.log("failed", error)
                })
        },
        test(){
            console.log(this.updateLink)
        }
    }
}

</script>
