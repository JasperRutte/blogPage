
<template>
    <div class="container mt-5">
        <h1>Create link.</h1>
        <div class="bigCard p-3">
            <form>
                <label>Title</label><br>
                <input v-model="linksData.title" class="form-control"><br>
                <label>Link</label><br>
                <textarea v-model="linksData.contents" class="form-control"></textarea>
            </form>
            <p @click="createBlog" class="text-info mt-3" style="cursor: pointer">submit</p>
        </div>
        <div class="alert alert-danger" role="alert" v-if="error">
            <p>Please fill in the form correctly.</p>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            linksData: {
                title: "",
                contents: "",
                userId: "",
            },
            error: false,
            linkPosts: []
        }
    },

    methods: {
        createBlog() {
            axios.post('/api/link/create', this.linksData)
                .then(response => {
                    console.log("success",response);
                    this.$router.push("/links");
                })
                .catch(error => {
                    this.error = true;
                    console.log("error", error);
                })

        }
    },
    mounted() {
        this.linksData.userId = this.user.id;
    }
}


</script>
