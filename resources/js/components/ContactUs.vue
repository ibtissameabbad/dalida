<template>
    <section class="contact-page text-center my-5">
        <div class="container">
            <div class="row p-4 g-lg-5">
                <div class="left col-12 col-lg-6">
                    <h1 class="mb-3 mb-lg-5 text-capitalize">{{texts.contactUs}}!</h1>
                    <form class="mb-4 mb-lg-5">
                        <div class="mb-3">
                            <input type="text" class="form-control border-0 rounded-0 p-lg-3"
                                   :placeholder="texts.name" v-model="form.name"/>
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control border-0 rounded-0 p-lg-3"
                                   placeholder="N° de téléphone" v-model="form.telephone"/>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control border-0 rounded-0 p-lg-3" placeholder="E-MAIL"
                                   v-model="form.email"/>
                        </div>
                        <div class="mb-3">
                            <textarea name="msg" id="msg" cols="30" rows="5"
                                      class="form-control border-0 rounded-0 p-lg-3"
                                      :placeholder="texts.contactUsMessage" v-model="form.message"></textarea>
                        </div>
                        <div>
                            <button class="btn text-white w-100 p-lg-3" type="submit" @click="send">{{texts.send}}</button>
                        </div>
                    </form>
                    <div class="contact-info">
                        <div class="address d-flex gap-1 align-items-center mb-lg-2">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>13, Angle Bd de la Gironde et Rue de l'Esparre 4ème étage N°13 - Casablanca, Maroc</span>
                        </div>
<!--                        <div class="telephone d-flex gap-1 align-items-center mb-lg-2">-->
<!--                            <i class="fa-solid fa-phone"></i>-->
<!--                            <span>(+212) 123 456 7890</span>-->
<!--                        </div>-->
                        <div class="mobile d-flex gap-1 align-items-center mb-lg-2">
                            <i class="fa-solid fa-mobile-screen"></i>
                            <span>(+212) 6 04 07 07 83</span>
                        </div>
                    </div>
                </div>
                <div class="right col-12 col-lg-6 d-none d-lg-block">
                    <img src="/images/contact.jpg" alt="contact" class="img-fluid h-100"/>
                </div>

            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "contact-us",
    props: ["texts"],
    data() {
        return {
            form: {
                name: '',
                telephone: '',
                email: '',
                message: ''
            }
        }
    },
    methods: {
        async send(e) {
            e.preventDefault()
            try {
                const payload = {
                    form: this.form
                }
                const response = await window.axios.post("/contact", payload);

                if (response.data.success) {
                    window.Swal.fire({
                        title: "Succès!",
                        text: "Merci de nous avoir contactés. Nous vous répondrons dans les plus brefs délais.",
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
                        text: "Merci de remplir tous les champs qui sont obligatoire",
                        icon: "error",
                        confirmButtonText: "Remplir",
                    });
                }
            }
        }
    }
}
</script>

<style scoped>

</style>
