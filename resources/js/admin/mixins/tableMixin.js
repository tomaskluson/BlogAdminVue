// budu chtít imporotovat všude 
// musím si z něho vyexporotovat
import moment from 'moment'

export default {
    data() {
        return {
            data: [],
            search: ''
        }
    },
    methods: {
        shorten(text, len = 50) {
            return _.truncate(text, {length: len })
        },
        niceDate(datetime) {
            return moment(datetime).format('DD/MM/Y')
        },
    },
    computed: {
        filteredItems() {
            return this.data.filter(item => {
                console.log(item)
                return item[this.searchColumn]
                    .toLowerCase()
                    .includes(this.search.toLowerCase())
            })
        }
    }
}