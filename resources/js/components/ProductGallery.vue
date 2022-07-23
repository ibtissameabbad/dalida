<template>
    <div class="d-flex gap-3 mb-2 justify-content-center" style="gap: 1rem">
        <div
            class="d-flex flex-column gap-2"
            style="gap: 1rem"
            v-for="gallery in galleries"
            :key="gallery.id"
        >
            <img
                style="width: 100px; height: 100px"
                class="img-fluid"
                :src="'/storage/' + gallery.path"
                alt="produit"
            />
            <button
                class="btn btn-danger"
                type="submit"
                @click.prevent="deleteGallery(gallery.id)"
            >
                Delete
            </button>
        </div>
    </div>
</template>
<script>
export default {
    name: "product-gallery",
    props: ["id", "galleries"],
    data() {
        return {};
    },
    mounted() {
        console.log("this.props", this.id);
        console.log("this.props", this.galleries);
    },
    created() {},
    methods: {
        async deleteGallery(id) {
            const res = await window.axios.delete("/product-gallery/" + id);
            console.log("res", res);
            if (res.data.success) {
                this.galleries = this.galleries.filter(
                    (gallery) => gallery.id !== id
                );
                window.Swal.fire({
                    title: "Succès!",
                    text: "Vous avez supprimer cette image",
                    icon: "success",
                    confirmButtonText: "Cool",
                });
            }
        },
    },
};
</script>
