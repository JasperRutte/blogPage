
<template>
    <div class="container mt-5">
        <h1>Create link.</h1>
        <div class="bigCard p-3">
            <form>
                <label>Title</label><br>
                <input v-model="linksData.title" class="form-control" maxlength="50"><br>
                <label>Link</label><br>
                <textarea v-model="linksData.contents" class="form-control" maxlength="2000"></textarea>
                <p v-if="linksData.contents">{{linksData.contents.length}} / 2000</p>

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
                user_id: "",
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
        this.linksData.user_id = this.user.id;
    }
}


</script>
