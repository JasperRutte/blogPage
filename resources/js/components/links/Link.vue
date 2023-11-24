<template>
    <div class="container">
        <div class="row mt-5">
            <h2 class="display-5">Links.</h2>
            <div v-for="link in links" class="p-2 col-sm-5 col-xl-3 " @click="this.$router.push('/ViewLink/' + link.id)">
                <div class="card card-body">
                    <h2 class="col-12 mb-4 text-truncate">{{link.links}}</h2>
                    <a class="col-12 mb-4 text-truncate">{{link.body}}</a>
                </div>
            </div>
            <div class="p-2 col-sm-5 col-xl-3" v-if="user" @click="this.$router.push('/CreateLinks')">
                <div class="card card-body">
                    <h2 class="text-center">+</h2>
                </div>
            </div>
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
