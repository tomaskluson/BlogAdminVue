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
<<<<<<< HEAD
                console.log('data')
                consol.log(this.data)
=======
>>>>>>> d2bfc703500574879a665e08d4083c382f8043dd
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

