<template>
    <div class="bg-blue-500 p-4">
        <div class="container mx-auto flex items-center justify-between">
            <div class="text-white font-bold text-lg">
                Waywiz Admin
            </div>

            <router-link
                v-if="!isAuthenticated"
                :to="{ name: 'login' }"
                class="text-white hover:text-gray-300"
            >
                Войти
            </router-link>

            <button
                v-if="isAuthenticated"
                @click="logout"
                class="text-white hover:text-gray-300"
            >
                Выйти
            </button>
        </div>
    </div>

    <div class="container mx-auto">
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: "Index",
    data() {
        return {
            isAuthenticated: localStorage.getItem("auth_token") !== null
        };
    },
    methods: {
        logout() {
            localStorage.removeItem("auth_token");
            this.isAuthenticated = false;
            this.$router.push({ name: "login" });
        }
    },
    watch: {
        "$route"() {
            this.isAuthenticated = localStorage.getItem("auth_token") !== null;
        }
    }
};
</script>
