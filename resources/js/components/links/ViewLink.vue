<template>
    <div class="container mt-5">
        <div class="bigCard p-3">
            <a :href="linkPost.contents"><h2>{{linkPost.title}}</h2></a><br>
            <div class="row">
                <p class="text-danger col-1" @click="removeLink" v-if="user" style="cursor: pointer">Delete</p>
                <p class="text-warning col" @click="this.$router.push('/Editlink/' + linkPost.id)" v-if="user" style="cursor: pointer">Edit</p>
            </div>


<!--            <button class="btn btn-danger" @click="removeLink" v-if="user">Delete</button>-->
<!--            <button class="btn btn-secondary" @click="this.$router.push('/Editlink/' + linkPost.id)" v-if="user">edit</button>-->
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

        axios.get(`/api/link/`+this.$route.params.id)
            .then(response => {
                this.linkPost = response.data.link;
                // this.hasLoaded = true
                console.log(response.data, 'test')
                console.log(response.data.link)
            })
            .catch(error => {
                console.error(error);
            });
    },
    methods: {
        removeLink() {
            if (confirm("Are you sure?")){
                axios.delete(`/api/link/`+this.$route.params.id+`/delete`)
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

