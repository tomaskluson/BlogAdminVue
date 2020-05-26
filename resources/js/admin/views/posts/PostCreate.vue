<template>
    <div>
        <h1 class="title">create new post</h1>
        <!-- z rodiče posílám k dceři data pomocí :errors="errors" (PostCreateForm) -->
        <post-create-form 
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
                errors: {}
            }
        },
        components: {
            PostCreateForm,
        },
        methods: {
            submitForm(data) {
                // přes axios posílání dat 
                // poslání dat z VUE do Laravelu
                axios
                    .post('/api/posts', data)
                    .then(response => {
                        this.$router.push(`/admin/posts/${response.data.post.id}`)
                })
                .catch(errors => {
                    this.errors = errors.response.data.errors
                })
            }
        },
    }
</script>

