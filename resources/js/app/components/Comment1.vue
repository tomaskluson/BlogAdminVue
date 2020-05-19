<template>
    <div>

        <p>{{ comments.length }} components</p>

        <li 
            v-for="comment in comments" 
            :key="comment.id"> 
            
            {{ comment.text }}

            <button @click="comments.pop()">delete</button>
        </li>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                comments: [
                    {
                        id: 1,
                        text: 'Architecto in aut quisquam modi.'
                    },
                    {
                        id: 2,
                        text: 'Totam sint qui quai gui. Id consequuntur repudiandea non.'
                    },
                    {
                        id: 3,
                        text: 'Voluptates architecto animi qui tenetur.'
                    }
                ]
            }
        },
    }
</script>

<style lang="scss" scoped>

</style> 