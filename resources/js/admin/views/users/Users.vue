<template>
    
    <section class="users-page">
        <table-search 
            :totalCount="data.length"
            :count="filteredItems.length"
            resource="user"
            @searchQueryChanged="search = $event" />

        <!-- <div 
            v-for="user in users" 
            :key="user.id">
            {{ user }}
        </div> -->

        <table class="table is-bordered is-striped is-fullwidth">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>registered at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr 
                    v-for="user in filteredItems" 
                    :key="user.id">

                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ niceDate(user.created_at) }}</td>
                    <td>
                        <table-edit-links resource="user" :id="user.id"/>
                    </td>
                </tr>
            </tbody>
        </table>

    </section>

</template>

<script>
import tableMixin from '../../mixins/tableMixin'
import TableSearch from '../../components/TableSearch.vue'
import TableEditLinks from '../../components/TableEditLinks.vue'

    export default {
        mixins: [tableMixin],
        components: {
            TableSearch,
            TableEditLinks
        },
        data() {
            return {
                searchColumn: 'name'
            }
        },
        created() {
            axios.get('/api/users').then(response => {
                this.data = response.data
            })
        },
    }
</script>

<style lang="scss" scoped>

</style>