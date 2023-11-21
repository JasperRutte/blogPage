<template>
    <div v-for="link in links" class="p-2 col-sm-5 col-xl-3 " @click="this.$router.push('/ViewBlog/' + link.id)">
        <div class="card card-body text-truncate">
            <h2>{{link.links}}</h2>
            <p>{{link.body}}</p>
        </div>
    </div>
    <div class="p-2 col-sm-5 col-xl-3" v-if="user" @click="this.$router.push('/CreateLinks')">
        <div class="card card-body">
            <h2 class="text-center">+</h2>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                links: []
            }
        },
        mounted() {
            axios.get('/api/index/link')
                .then(response => {
                    this.links = response.data
                })
        }
    }
</script>
