<template>
    <div class="container">
        <div class="mt-5">
            <h1>Hey,</h1>
            <h2>Welcome to my site...</h2>
            <p>My name Jasper Rutte and I’m a starting software developer. I’m currently primarily using VueJS and Laravel. <br>I can also work pretty well in vanilla JavaScript, vanilla php, python, html, css, bootstap and tailwind!</p>
        </div>

        <div>
            <h2>Most recent Blogs.</h2>
            <div class="row" v-if="blogPosts.length !== 0" >
                <div v-for="(blog, index) in recentBlogPosts" :key="blog" class="col-md-3 mb-2" @click="this.$router.push('/ViewBlog/' + blog.id)">
                    <div class="card card-body">
                        <h2 class="col-12 mb-4 text-truncate">{{blog.title}}</h2>
                        <p class="col-12 text-truncate"> {{blog.body}}</p>
                    </div>
                </div>
                <router-link class="nav-item nav-link" to="/blog">See more.</router-link>
            </div>

            <div v-else>
                <h3>no blog posts yet :(</h3>
                <p v-if="user" @click="this.$router.push('/CreateBlog/')">create a blog :)</p>
            </div>
        </div>
        <div class="mt-3">
            <h2>Most recent Links.</h2>
            <div class="row" v-if="LinkPosts.length !== 0" >
                <div v-for="(link, index) in recentLinkPosts" :key="link" class="col-md-3 mb-2" @click="this.$router.push('/ViewLink/' + link.id)">
                    <div class="card card-body">
                        <h2 class="col-12 text-truncate">{{link.links}}</h2>
                        <p class="col-12 text-truncate">{{link.body}}</p>
                    </div>
                </div>
                <router-link class="nav-item nav-link" to="/Links">See more.</router-link>
            </div>
            <div v-else>
                <h3>No links yet :(</h3>
                <p v-if="user" @click="this.$router.push('/CreateLinks/')">create a link :)</p>
            </div>
        </div>
        </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            blogPosts: [],
            LinkPosts: [],
        }
    },

    computed: {
        recentBlogPosts() {
            return this.blogPosts.slice(-4)
        },
        recentLinkPosts() {
            return this.LinkPosts.slice(-4)
        }
    },

    mounted() {
        axios.get('/api/index/blogs')
            .then(response => {
                this.blogPosts = response.data
            })

        axios.get('/api/index/link')
            .then(response => {
                this.LinkPosts = response.data
            })
    },

}


</script>
