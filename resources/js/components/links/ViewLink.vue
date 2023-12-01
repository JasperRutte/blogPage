<template>
    <div class="container mt-5">
        <div class="bigCard p-3">
            <a :href="linkPost.contents" target=”_blank”><h2>{{linkPost.title}}</h2></a><br>
            <p class="text-secondary small">{{userPosted + " ~ " + linkPost.created_at }}</p>
            <div class="row">
                <p class="text-danger col-lg-1 col-sm-3" @click="removeLink" v-if="user" style="cursor: pointer">Delete</p>
                <p class="text-warning col-1" @click="this.$router.push('/Editlink/' + linkPost.id)" v-if="user" style="cursor: pointer">Edit</p>
            </div>


<!--            <button class="btn btn-danger" @click="removeLink" v-if="user">Delete</button>-->
<!--            <button class="btn btn-secondary" @click="this.$router.push('/Editlink/' + linkPost.id)" v-if="user">edit</button>-->
        </div>

    </div>

</template>

<script>
import axios from "axios";

export default {
    data(){
        return {
            linkPost: [],
            userPosted: [],
        }
    },
    methods: {
        removeLink() {
            if (confirm("Are you sure?")){
                axios.delete(`/api/link/${this.$route.params.id}/delete`)
                    .then(response => {
                        console.log("success", response);
                        this.$router.push("/links");
                    })
                    .catch(error => {
                        console.error("failed", error);
                    });
            } else {
                console.log("failed");
            }
        },
        formatDateTime(dateTimeString) {
            return dateTimeString.replace('T', ' ').replace('.000000Z', '');
        },
    },
    mounted() {

        axios.get(`/api/link/${this.$route.params.id}`)
            .then(response => {
                this.linkPost = response.data.link;
                this.linkPost.created_at = this.formatDateTime(this.linkPost.created_at)
                console.log("success", response);
                axios.get(`/api/getUser/${response.data.link.user_id}`)
                    .then(returnedUser => {
                        this.userPosted = returnedUser.data.user.name
                    })
            })
            .catch(error => {
                console.error("error", error);
            });
    },
}

</script>

