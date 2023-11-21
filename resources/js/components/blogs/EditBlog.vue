<template>
    <input v-model="blogPost.id" >
</template>
<script>
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
}

</script>
