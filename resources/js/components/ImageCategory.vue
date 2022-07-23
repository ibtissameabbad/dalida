<template>
    <div class="category p-3">
        <div>
            <h1 class="text-uppercase mb-3"><span class="fw-bold">{{text[0]}}</span> {{text[1]}}</h1>
        </div>
<!--        <button v-on:click="show = !show">-->
<!--            Toggle-->
<!--        </button>-->
<!--        <transition name="fade">-->
<!--            <p v-if="show">hello</p>-->
<!--        </transition>-->
        <transition name="slide-fade">
        <div class="image m-auto mb-2 image-fluid"
         :style="{backgroundImage: 'url('+ image + ')'}"
         @mouseover="hoverImage"
         @mouseleave="hoverLeaveImage" ref="image"></div>
        </transition>

    </div>
</template>

<script>
export default {
    name: "image-category",
    data() {return {
        show: true
    }},
    props: ['image', 'imagehover', 'text'],
    mounted() {
        console.log(this.category)
    },
    methods: {
        hoverImage(e) {
            e.preventDefault();
            this.$refs.image.style.backgroundImage =  'url('+ this.imagehover+ ')'
        },
        hoverLeaveImage(e) {
            e.preventDefault();
            this.$refs.image.style.backgroundImage =  'url('+ this.image+ ')'
        }
    }
}
</script>

<style scoped>

</style>
