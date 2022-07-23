<template>
    <div>
        <transition namw="fade">
            <img :src="srcImage"
         alt="women"
         class="two-womens img-fluid mb-5" @mouseover="hoverImage" @mouseleave="hoverLeaveImage" ref="image"/>
        </transition>
    </div>
</template>

<script>
export default {
    name: "image-category",
    data() {
        return {
            srcImage: '/images/footer-women.jpg'
        }
    },
    methods: {
        hoverImage(e) {
            e.preventDefault();
            console.log('hi')
            this.srcImage = '/images/footer-women-hover.jpg'
        },
        hoverLeaveImage(e) {
            e.preventDefault();
            this.srcImage = '/images/footer-women.jpg'
        }
    }
}
</script>

<style scoped>
/* we will explain what these classes do next! */
.v-enter-active,
.v-leave-active {
    transition: opacity 2s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
