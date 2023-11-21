
<template>
    <div id="container">
        <h1>Create blog</h1>
        <form>
            <label>Title</label><br>
            <input v-model="linksData.title" class="form-control"><br>
            <label>Contents</label><br>
            <textarea v-model="linksData.contents" class="form-control"></textarea>
        </form>
        <button @click="createBlog" class="btn btn-primary">submit</button>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            linksData: {
                title: "",
                contents: ""
            },
            linkPosts: []
        }
    },

    methods: {
        createBlog() {
            axios.post('/api/create/link', this.linksData) // Route still needs to be made
                .then(response => {
                    console.log("works");
                    console.log(response);
                    this.$router.push("/links");
                })
                .catch(error => {
                    console.log("error");
                    console.log(error);
                })
        }
    }
}


</script>
