import '../bootstrap'

import FlashMessage from './components/FlashMessage.vue'
import Comment from './components/Comment.vue'

const app = new Vue({
    el: '#app',
    components: {
        FlashMessage,
        Comment
    },

    mounted() {
        if( location.hash ) {
            setTimeout(() => {
                let el = location.hash.replace('scroll-to-', '')
            
                // pro plynulé scrollování na komentáře
                document
                    .querySelector(el)
                    .scrollIntoView({ behavior: 'smooth' })
            }, 150)
        }
    }
});
