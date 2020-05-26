<template>

    <transition name="fade"> 
        <div 
            class="notification is-success"
            v-show="visible">
            <button 
                class="delete"
                @click="hide">
            </button>
            {{ message }}
        </div>
    </transition>

</template>

<script>
    export default {
        props: ['text'],

        data() {
            return {
<<<<<<< HEAD
                message: '',
                visible: false
=======
                visible: false,
                message: ''
>>>>>>> d2bfc703500574879a665e08d4083c382f8043dd
            }
        },

        created () {
            if (this.text) {
                this.message = this.text
                this.show();
            }

            this.$root.$on('flash', message => {
                this.message = message
                this.show()
            })
        },

        methods: {
            show() {
                this.visible = true;
                setTimeout(() => this.hide(), 3000);
            },

            hide() {
                this.visible = false;    
            }
        },
    }
</script>

<style lang="scss" scoped>
.notification {
    font-size: 1.2rem;
    position: fixed;
    right: 2em;
    bottom: 2em;
}

.fade-enter-active, 
.fade-leave-active {
  transition: opacity 0.35s;
}
.fade-enter, 
.fade-leave-to {
  opacity: 0;
}
</style>