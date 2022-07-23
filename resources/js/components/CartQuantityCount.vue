<template>
    <div class="cart d-flex gap-3  align-items-center">
        <div class="add d-flex gap-2 align-items-center">
            <a href="#"
               class="plus rounded-circle text-decoration-none d-inline-block text-center" @click.prevent="descrement">-</a>
            <span class="number">{{qte}}</span>
            <a href="#"
               class="plus rounded-circle text-decoration-none d-flex justify-content-center text-center" @click.prevent="increment">+</a>
        </div>
    </div>
</template>
<script>
export default {
    name: "cart-quantity-count",
    props: ['id', 'qte'],
    data() {
    },
    mounted() {
    },
    created() {},
    methods: {
        increment(e) {
            this.qte++;
            this.updateCart(e);
        },
        descrement(e) {
            if(this.qte>1) this.qte--;
            this.updateCart(e);
        },
        async updateCart(e) {
            e.preventDefault();
            const res = await window.axios.put("/update-cart", {
                id: this.id,
                qte: this.qte,
            });
            if (res.data.success) {
                window.Swal.fire({
                    title: "Succès!",
                    text: "Vous avez modifier la quantite",
                    icon: "success",
                    confirmButtonText: "Cool",
                });
                window.location = '/cart'
            }
        },
    },
};
</script>
