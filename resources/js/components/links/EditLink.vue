<template>
<P>test</P>
    <div class="container mt-5">
        <h2>Edit blog</h2>
        <form>
            <input v-model="linkPost.links" class="form-control"><br>
            <textarea v-model="linkPost.body" class="form-control"></textarea>


        </form>
        <button @click="updateLink" class="btn btn-primary">Update</button>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data(){
        return {
            linkPost: [],
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
                })
                .catch(error => {
                    console.log("failed", error)
                })
        },
        test(){
            console.log(this.updateLink)
        }
    }
}

</script>
