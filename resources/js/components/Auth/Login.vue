<template>
    <div class="flex justify-center items-center h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">Логин</h2>
            <form @submit.prevent="submitLogin" v-if="! loading">
                <div class="mb-4">
                    <label
                        for="email"
                        class="block text-sm font-medium text-gray-700"
                        >Почта</label
                    >
                    <input
                        type="email"
                        id="email"
                        v-model="email"
                        placeholder="Введите email"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                    <p v-if="errors && errors.email" class="text-red-500 text-sm mt-1">
                        {{ errors.email[0] }}
                    </p>
                </div>

                <div class="mb-6">
                    <label
                        for="password"
                        class="block text-sm font-medium text-gray-700"
                        >Пароль</label
                    >
                    <input
                        type="password"
                        id="password"
                        v-model="password"
                        placeholder="Введите пароль"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                    <p v-if="errors && errors.password" class="text-red-500 text-sm mt-1">
                        {{ errors.password[0] }}
                    </p>
                </div>

                <button
                    type="submit"
                    class="w-full py-3 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    Войти
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Login",
    data() {
        return {
            email: "",
            password: "",
            errors: [],
            loading: false
        };
    },
    methods: {
        submitLogin() {
            this.loading = true;

            axios.post("/api/auth/login", {
                email: this.email,
                password: this.password,
            }).then(response => {
                if (response.data.user.is_admin) {
                    localStorage.setItem('auth_token', response.data.token);

                    this.$router.push({ name: 'admin.index' });
                } else {
                    this.errors = {
                        'email': {
                            0: 'User not found'
                        }
                    };
                }
                this.loading = false;
            }).catch(errors => {
                this.errors = errors.response.data.errors;
                this.loading = false;
            });
        },
    },
};
</script>

