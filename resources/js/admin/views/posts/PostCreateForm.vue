<template>
    <div>
        <!-- {{ $route.params }} -->
        <div class="field">
            <label class="label">Title</label>
            <div class="control">
                <input 
                    class="input" 
                    :class="{ 'is-danger': errors.title }"
                    type="text" 
                    placeholder="title"
                    name="title"
                    autocomplete="off"
                    v-model="title"
                >
            </div>

            <div v-if="errors.title">
                <p 
                    class="help is-danger"
                    v-for="(error, index) in errors.title"
                    :key="index"
                >
                    {{ error }}
                </p>
            </div>
        </div>

        <div class="field">
            <label class="label">Slug</label>
            <div class="control">
                <input 
                    class="input"
                    :class="{ 'is-danger': errors.slug }" 
                    type="text" 
                    placeholder="slug"
                    name="slug"
                    v-model="slug"
                >
                <div v-if="errors.slug">
                    <p 
                        class="help is-danger"
                        v-for="(error, index) in errors.slug"
                        :key="index"
                    >
                        {{ error }}
                    </p>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Text</label>
            <div class="control content">
            <!--
                <textarea 
                    name="text"
                    class="textarea" 
                    :class="{ 'is-danger': errors.text }"
                    placeholder="Textarea"
                    v-model="text"
                ></textarea>
            --> 

            <!-- na value navážeme text proměnnou -->
                <input 
                    id="x"
                    :value="text"
                    type="hidden" 
                    name="text"
                >
                <trix-editor 
                    input="x"
                    :class="{ 'input is-danger': errors.text }"
                ></trix-editor>
            </div>

            <div v-if="errors.text">
                <p 
                    class="help is-danger"
                    v-for="(error, index) in errors.text"
                    :key="index"
                >
                    {{ error }}
                </p>
            </div>

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
    import trix from 'trix'
    
    export default {
        //přijimám data z props od rodiče (PostCreate)
        props: ['errors', 'post'],
        data() {
            return {
                title: '',
                text: '',
                slug: '',
            }
        },
        // potom co je trix editor připraven;
        mounted () {
            // listener - poslouchá jestli se hodnota nezměnila
            document.addEventListener('trix-change', () => {
                this.text = document.getElementById('x').value
            })
        },
        methods: {
            submitForm() {
                //sbírám data
                let data = {
                    title: this.title,
                    slug: this.slug,
                    text: this.text,
                    user_id: 5
                }

                /* axios.get('api/users').then(response => {
                    console.log(response);
                }) */

                /* axios
                    .get('/api/posts', data)
                    .then(response => {
                        this.$router.push(`/admin/posts/${response.data.post.id}`)
                })
                .catch(errors => {
                    this.errors = errors.response.data.errors
                }) */

                //pak odpálím event
                //od dcery k rodičovi
                /* console.log(data) */
                this.$emit('post-form-submitted', data)
            }
        },
        watch: {
            title(value) {
                this.slug = _.trim(
                    _.deburr(this.title.toLowerCase())
                        .replace(/[^\w\s]/gi, '') // special characters
                        .replace(/ {2,}/g, ' ') // repeating spaces
                        .replace(/ /g, '-'), // spaces to -
                    '-'
                )
            },
            post(post) {
                this.title = post.title
                this.slug = post.slug
                this.text = post.text

                //z dokumentace
                let trix = document.querySelector('trix-editor')
                trix.editor.insertHTML(post.text)
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '~trix/dist/trix.css';

    trix-editor {
        min-height: 20em;
    }
</style>