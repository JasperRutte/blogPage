<template>
    <div class="container">
        <div>
            <h1></h1><br>
            <a :href="linkPost.body"><h2>{{linkPost.links}}</h2></a><br>
            <button class="btn btn-danger" @click="removeLink" v-if="user">Delete</button>
            <button class="btn btn-secondary" @click="this.$router.push('/Editlink/' + linkPost.id)" v-if="user">edit</button>
        </div>

    </div>

</template>

<script>
export default {
    data(){
        return {
            linkPost: [],
        }
    },
    mounted() {

        axios.get(`/api/show/`+this.$route.params.id+`/link`)
            .then(response => {
                this.linkPost = response.data.link;
                // this.hasLoaded = true
                console.log(this.linkPost.link, 'test')
            })
            .catch(error => {
                console.error(error);
            });
    },
    methods: {
        removeLink() {
            if (confirm("Are you sure?")){
                axios.delete(`/api/delete/`+this.$route.params.id+`/link`)
                    .then(response => {
                        console.log("success");
                        this.$router.push("/links");
                    })
                    .catch(error => {
                        console.log("failed");
                        console.error(error);
                    });
            } else {
                console.log("failed")
            }
        }

    } }

</script>

