<template>
    <div class="container mt-5">
        <h1>Create blog.</h1>
        <div class="bigCard p-3">
            <form>
                <label>Title</label><br>
                <input v-model="blogData.title" class="form-control"><br>
                <label>Contents</label><br>
                <textarea v-model="blogData.contents" class="form-control"></textarea>
            </form>
            <p @click="createBlog" class="text-info mt-3" style="cursor: pointer">submit</p>
            <div class="alert alert-danger" role="alert" v-if="error">
                <p>Please fill in the form correctly.</p>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            blogData: {
                title: "",
                contents: "",
                user_id: ""

            },
            blogPosts: [],
            error: false,
        }
    },

    methods: {
        createBlog() {
            axios.post('/api/blog/create', this.blogData)
                .then(response => {
                    console.log("works")
                    console.log(response)
                    this.$router.push("/Blog");
                })
                .catch(error =>{
                    this.error = true
                    console.log("error")
                    console.log(error)
                })
        }
    },
    mounted() {
      this.blogData.user_id = this.user.id
    }
}


</script>
