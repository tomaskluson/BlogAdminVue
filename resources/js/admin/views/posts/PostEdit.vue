<template>
    <div>
        <h1 class="title">edit post</h1>
        <!-- z rodiče posílám k dceři data pomocí :errors="errors" (PostCreateForm) -->
        <post-create-form 
            :post="post"
            :errors="errors"
            @post-form-submitted="submitForm"
        />
    </div>
</template>

<script>
    import PostCreateForm from './PostCreateForm'

    export default {
        data() {
            return {
                errors: {},
                post: {}
            }
        },
        components: {
            PostCreateForm,
        },
        methods: {
            submitForm(data) {
                let id = this.$route.params.id
                // přes axios posílání dat 
                // poslání dat z VUE do Laravelu
                axios
                    .patch(`/api/posts/${id}`, data)
                    .then(response => {
                        this.$router.push(`/admin/posts/${id}`)
                })
                .catch(errors => {
                    this.errors = errors.response.data.errors
                })
            }
        },
        created() {
            axios.get('/api/posts/' + this.$route.params.id).then(response => {
                this.post = response.data
            })
        }
    }
</script>

