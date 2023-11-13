<template>
    <div id="container">
        <h1>{{blogPost.title}}</h1><br>
        <p>{{blogPost.body}}</p><br>
        <button class="btn btn-danger" @click="removeBlog">Delete</button>
    </div>

</template>

<script>

import blog from "./Blog.vue";

export default {
    data(){
        return {
            blogPost: [],
            hasLoaded: false
        }
    },
   mounted() {
       axios.get(`/api/show/`+this.$route.params.id)
           .then(response => {
               this.blogPost = response.data.blog;
               this.hasLoaded = true
               console.log(this.blogPost)
           })
           .catch(error => {
               console.error(error);
           });
   },
    methods: {
        removeBlog() {
            if (confirm("Are you sure?")){
                axios.delete(`/api/delete/${this.$route.params.id}`)
                    .then(response => {
                        console.log("success");
                        this.$router.push("/Blog");
                    })
                    .catch(error => {
                        console.log("failed");
                        console.error(error);
                    });
            } else {
                console.log("Test")
            }
    }

} }

</script>

<style>
#blogCard {
    margin: auto;
    width: 50%;
    padding: 10px;
    border-radius: 10px;
    background-color: #F4F4F4;
    box-shadow: 0 2px 3px darkgrey;
}
</style>
