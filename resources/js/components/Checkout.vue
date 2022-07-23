<template>
    <section class="shipping-page m-5">
        <div class="container">
            <h3 id="title" class="font-weight-bold my-4">{{ shippingtexts.shippingAddressText }}</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="row d-flex flex-row justify-content-between">
                        <div
                            id="tabs"
                            class="card col-12 col-md-8 px-0 border-0 rounded-lg shadow-sm"
                        >
                            <div id="Home" class="tabcontent d-block">
                                <!--                                <h5 class="mt-2 font-weight-bold">Home Shipping Address</h5>-->
                                <div class="col-md-12 my-3">
                                    <div class="my-2">
                                        <label class="small text-muted mb-2"
                                        >{{ shippingtexts.lastname }} *</label
                                        >
                                        <input
                                            id="local"
                                            type="text"
                                            name="lastname"
                                            :placeholder="shippingtexts.lastname +' *'"
                                            v-model="shipping.lastname"
                                            class="form-control rounded-lg h-50"
                                        />
                                    </div>
                                    <div class="my-2">
                                        <label class="small text-muted mb-2"
                                        >{{ shippingtexts.firstname }} *</label
                                        >
                                        <input
                                            type="text"
                                            name="firstname"
                                            :placeholder="shippingtexts.firstname+ ' *'"
                                            v-model="shipping.firstname"
                                            class="form-control rounded-lg h-50"
                                        />
                                    </div>
                                    <div class="my-2">
                                        <label class="small text-muted mb-2"
                                        >Email</label
                                        >
                                        <input
                                            type="text"
                                            name="email"
                                            placeholder="Email"
                                            v-model="shipping.email"
                                            class="form-control rounded-lg h-50"
                                        />
                                    </div>
                                    <div class="my-2">
                                        <label class="small text-muted mb-2"
                                        >{{ shippingtexts.telephoneNumber }}</label
                                        >
                                        <input
                                            type="text"
                                            name="telephone"
                                            :placeholder="shippingtexts.telephoneNumber"
                                            v-model="shipping.telephone"
                                            class="form-control rounded-lg h-50"
                                        />
                                    </div>
                                    <div class="my-2">
                                        <label class="small text-muted mb-2">{{ shippingtexts.city }}</label>
                                        <select
                                            class="form-control rounded-lg h-50"
                                            name="city"
                                            id="city"
                                            v-model="shipping.city"
                                        >
                                            <option selected disabled>{{ shippingtexts.city }}</option>
                                            <option
                                                v-for="(city, index) in cities"
                                                :key="index"
                                                :value="city.name"
                                            >
                                                {{ city.name }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="my-2">
                                        <label class="small text-muted mb-2"
                                        >{{ shippingtexts.address }} *</label
                                        >
                                        <input
                                            type="text"
                                            name="address"
                                            :placeholder="shippingtexts.address"
                                            v-model="shipping.address"
                                            class="form-control rounded-lg h-50"
                                        />
                                    </div>
                                    <div class="my-2">
                                        <label class="small text-muted mb-2"
                                        >{{ shippingtexts.codePostal }}</label
                                        >
                                        <input
                                            type="text"
                                            name="codePostal"
                                            :placeholder="shippingtexts.codePostal"
                                            v-model="shipping.codePostal"
                                            class="form-control rounded-lg h-50"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-12 col-md-4 d-flex flex-column align-self-center"
                        >
                            <div
                                class="card d-flex flex-end align-items-center border-0 rounded-lg shadow-sm h-70"
                            >
                                <h3 class="my-4">
                                    <b>Total :</b>
                                    <strong class="text-success"
                                    >{{ currencySign }}{{ total.toFixed(2) }}</strong
                                    >
                                </h3>
                            </div>
                            <button
                                class="btn rounded-lg shadow-lg mx-3 mt-3 mb-3 mb-lg-0"
                                @click="checkout"
                                :disabled="loading"
                            >{{shippingtexts.order}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    name: "checkout",
    props: ["currency", "shippingtexts"],
    data() {
        return {
            shipping: {
                firstname: "",
                lastname: "",
                email: "",
                telephone: "",
                address: "",
                city: "",
                codePostal: "",
            },
            total: 0,
            currencySign: "MAD ",
            loading: false,
            cities: []
        };
    },
    mounted() {
        this.loadCities();
        this.loadTotal();
        console.log("this.currency", this.currency);
        if (this.currency === "dollar") this.currencySign = "$ ";
        if (this.currency === "euro") this.currencySign = "€ ";
        console.log('t', this.shippingtexts)
    },
    created() {
    },
    methods: {
        async checkout(e) {
            e.preventDefault();
            this.loading = true;
            try {
                const payload = {
                    shipping: this.shipping,
                    total: this.total,
                    currency: this.currency,
                };
                console.log(payload);
                const res = await window.axios.post("/checkout", payload);
                console.log("res", res);
                if (res.data.success) {
                    this.loading = false;
                    window.Swal.fire({
                        title: "Succès!",
                        text: "Votre commande à été réalisé avec succès. Un mail de confirmation a été envoyé, veuillez vérifier votre boîte de réception.",
                        icon: "success",
                        confirmButtonText: "Cool",
                        timer: 10000,
                    }).then(function () {
                        window.location = "/";
                    });
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
                this.loading = false;
            }
        },
        async loadCities() {
            try {
                const {data} = await window.axios.get("/city");
                if (data.success) {
                    this.cities = data.data;
                }
            } catch (error) {
                const errors = error.response;
            }
        },
        async loadTotal() {
            const response = await window.axios.get("/cart/total");
            if (response.data.success) this.total = response.data.data;
        },
    },
};
</script>
