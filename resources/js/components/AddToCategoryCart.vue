<template>
    <a href="#" class="btn text-white fw-bold" @click="addToCart">{{texts.addToCart}}</a>
</template>

<script>
export default {
    name: "AddToCart",
    props: ['id', 'texts'],
    methods: {
        async addToCart() {
                const res = await window.axios.post("/add-to-cart/category/" + this.id, {
                    count: 1
                });
                console.log("res", res);
                if (res.data.success) {
                    window.Swal.fire({
                        title: "Succès!",
                        text: "Vous avez ajouter au panier",
                        icon: "success",
                        confirmButtonText: "Cool",
                    });
                    window.location = '/cart'
                }
        }
    }
}
</script>

<style scoped>

</style>
