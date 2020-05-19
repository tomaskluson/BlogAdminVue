<template>
    <div>
        <h1 class="title">create new comment</h1>
        <!-- z rodiče posílám k dceři data pomocí :errors="errors" (PostCreateForm) -->
        <comment-create-form 
            @comment-form-submitted="submitForm"/>
    </div>
</template>

<script>
    import CommentCreateForm from './CommentCreateForm'

    export default {
        components: {
            CommentCreateForm,
        },
        methods: {
            submitForm(data) {
                console.log('vypis dat')
                console.log(data)
                // přes axios posílání dat 
                // poslání dat z VUE do Laravelu
                axios
                    .post('/api/comments', data)
                    .then(response => {
                        this.$router.push(`/admin/comments/${response.data.post.id}`)
                })
                .catch(errors => {
                    this.errors = errors.response.data.errors
                    /* this.errors = errors.response.data.errors */
                })
            }
        },
    }
</script>

