<template>
    <div>
        <div class="field">
            <label class="label">Text</label>
            <div class="control">
                <textarea 
                    class="input" 
                    type="text" 
                    placeholder="text"
                    name="text"
                    autocomplete="off"
                    v-model="text"
                >
                </textarea>
            </div>
        </div>

        <div class="field">
            <label class="label">Post</label>
            <div class="select">
                <select v-model="post_id">
                    <option v-for="option in options" :value="option.id" :key="option.id">
                        {{ option.title }}
                    </option>
                </select>
                
            </div>
            <span class="tag">
                ID: {{ post_id }}
            </span>
        </div>
        


        <div class="field is-grouped">
            <div class="control">
                <button
                    @click="submitForm" 
                    class="button is-primary"
                >Submit</button>
            </div>
            <div class="control">
                <button 
                    @click="$router.go(-1)"
                    class="button is-text"
                >Cancel</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        //přijimám data z props od rodiče (PostCreate)
        data() {
            return {
                text: '',
                post_id: '',
                options: []
            }
        },
        created() {
            axios.get('/api/posts/').then(response => {
                this.options = response.data
            })
        },
    methods: {
        submitForm() {
            //sbírám data
                let data = {
                    text: this.text,
                    post_id: this.post_id,
                    user_id: 7
                }

                //pak odpálím event
                //od dcery k rodičovi
                this.$emit('comment-form-submitted', data)
        }
    },

    }
</script>

<style lang="scss" scoped>
    div .control textarea {
        min-height: 10em;
    }

    div .select select {
        width: 400px;
    }
    
</style>