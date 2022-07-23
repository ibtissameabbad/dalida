<template>
    <div class="cart d-flex gap-3 mb-3 mb-lg-4 align-items-center">
        <div class="add d-flex gap-2 align-items-center">
            <a href="#"
               class="plus rounded-circle text-decoration-none d-inline-block text-center" @click.prevent="descrement">-</a>
            <span class="number">{{count}}</span>
            <a href="#"
               class="plus rounded-circle text-decoration-none d-flex justify-content-center text-center" @click.prevent="count++">+</a>
        </div>
        <button
            class="btn add-cart border-0 px-4 text-uppercase py-0 rounded-0"
            @click.prevent="addToCart"
        >{{texts.addToCart}}</button>
        <!-- <a href="#" class="wishlist">
            <img src="/images/wishlist-like.svg" alt="star"/>
        </a> -->
    </div>
</template>
<script>
export default {
    name: "category-add-to-cart-wishlist",
    props: ['id', 'texts'],
    data() {
        return {
            count: 1,
        };
    },
    mounted() {
    },
    created() {},
    methods: {
        descrement() {
            if(this.count>1) this.count--;
        },
        async addToCart() {
            const res = await window.axios.post("/add-to-cart/category/" + this.id, {
                count: this.count
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
        },
    },
};
</script>
