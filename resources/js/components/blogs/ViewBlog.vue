<template>
    <div class="container">
        <div class="bigCard mt-5 p-3" style=" word-wrap: break-word;">
            <h1>{{blogPost.title}}</h1><br>
            <p>{{blogPost.contents}}</p><br>
            <p class="text-secondary small">{{userPosted + " ~ " + blogPost.created_at }}</p>
            <div class="row">
                <p class="text-danger col-lg-1 col-sm-3" @click="removeBlog" v-if="user" style="cursor: pointer">Delete</p>
                <p class="text-warning col-1" @click="this.$router.push('/EditBlog/' + blogPost.id)" v-if="user" style="cursor: pointer">Edit</p>
            </div>
        </div>
    </div>

</template>

<script>

import blog from "./Blog.vue";
import axios from "axios";

export default {
    data() {
        return {
            blogPost: [],
            hasLoaded: false,
            userPosted: [],
        }
    },

    methods: {
        removeBlog() {
            if (confirm("Are you sure?")) {
                axios.delete(`/api/blog/${this.$route.params.id}/delete`)
                    .then(response => {
                        this.$router.push("/Blog");
                    })
                    .catch(error => {
                        console.error("error", error);
                    });
            }
        },
        formatDateTime(dateTimeString) {
            return dateTimeString.replace('T', ' ').replace('.000000Z', '');
        },
    },

    mounted() {
        axios.get(`/api/blog/${this.$route.params.id}`)
            .then(response => {
                this.blogPost = response.data.blog;
                this.blogPost.created_at = this.formatDateTime(this.blogPost.created_at);
                this.hasLoaded = true;

                axios.get(`/api/getUser/${response.data.blog.user_id}`)
                    .then(returnedUser => {
                        this.userPosted = returnedUser.data.user.name;
                    })
            })
            .catch(error => {
                console.error(error);
            });
    }
}

</script>

