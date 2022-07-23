<template>
    <form class="mb-3">
        <fieldset class="d-flex gap-2 form-group-lg">
            <input class="form-control w-75 " type="email" placeholder="Email" v-model="email"/>
            <input type="submit" class="btn text-uppercase" :value="subscribetext" @click="subscribe">
        </fieldset>
    </form>
</template>

<script>
export default {
    name: "contact-us",
    props: ["subscribetext"],
    data() {
        return {
            email: '',
        }
    },
    methods: {
        async subscribe(e) {
            e.preventDefault()
            try {
                const payload = {
                    email: this.email,
                    from: 'footer'
                }
                const response = await window.axios.post("/lead", payload);

                if (response.data.success) {
                    window.Swal.fire({
                        title: "Succès!",
                        text: "Merci de nous avoir contaés. Nous vous répondrons dans les plus brefs délais.",
                        icon: "success",
                        confirmButtonText: "Cool",
                    });
                    window.location = '/home'
                }
            } catch (error) {
                const errors = error.response;
                if (errors.status === 422) {
                    window.Swal.fire({
                        title: "Erreur!",
                        text: "Merci de remplir l'email",
                        icon: "error",
                        confirmButtonText: "Remplir",
                    });
                }
            }
        }
    },
    mounted() {
        console.log(this.subscribetext)
    }
}
</script>

<style scoped>

</style>
