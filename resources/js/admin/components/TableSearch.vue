<template>
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <p class="subtitle is-5">
                    <strong>{{ count }} of </strong> 
                    <strong>{{ totalCount }}</strong> {{ resource }}s
                </p>
            </div>
            <div class="level-item">
            <div class="field has-addons">
                <p class="control">
                    <input 
                        class="input" 
                        type="text" 
                        :placeholder="'find a' + resource"
                        v-model="searchQuery">
                </p>
                <p class="control">
                    <button class="button">
                        Clean
                    </button>
                </p>
            </div>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <p class="level-item">
                <router-link 
                    :to="`/admin/${resource}s/new`" 
                    class="button is-success"
                >New {{ resource }}</router-link>
            </p>
        </div>
    </nav>
</template>

<script>
    export default {
        props: {
            count: {
                type: Number,
                default: 0
            },
            resource: {
                type: String
            },
            totalCount: {
                type: Number
            }
        },
        data() {
            return {
                searchQuery: ''
            }
        },
        watch: {
            searchQuery(value) {
                // chceme poslat nahoru zprávu rodiči
                // vyšlu událost
                this.$emit('searchQueryChanged', value)
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>