<template>
    <div class="container">
        <div class="login_form">
            <form @submit.prevent="submit">
                <div class="mb-3 row justify-content-center">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input id="inputEmail" v-model="auth.email" type="text" class="form-control" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input id="inputPassword" v-model="auth.password" type="password" class="form-control" />
                    </div>
                </div>
                <button type="button" class="btn btn-primary" @click="login">
                    Inloggen
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            auth: {
                email: '',
                password: '',
            },
        };
    },
    methods: {
        login() {
            this.$store.dispatch('account/login', this.auth).then(() => {
                this.$router.push('/');
            });
        },
    },
};
</script>

<style scoped>
.container {
    width: 40%;
}


</style>