<template>
    <nav class="level is-mobile is-hidden-mobile">
        <div class="level-item has-text-centered box">
            <div>
            <p class="heading">Tweets</p>
            <p class="title">3,456</p>
            </div>
        </div>
        <div class="level-item has-text-centered box">
            <div>
            <p class="heading">Following</p>
            <p class="title">123</p>
            </div>
        </div>
        <div class="level-item has-text-centered box">
            <div>
            <p class="heading">Followers</p>
            <p class="title">456K</p>
            </div>
        </div>
        <div class="level-item has-text-centered box">
            <div>
            <p class="heading">Likes</p>
            <p class="title">789</p>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>
.level {
    margin-bottom: 2.5em;
}

.level-item {
    flex-basis: 20%;
    white-space: nowrap;
}

</style>