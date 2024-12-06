<template>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold text-center mb-6">
            Список пользователей
        </h1>
        <div class="overflow-x-auto">
            <table
                class="table-auto w-full border-collapse border border-gray-200"
            >
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 text-left">
                            Имя
                        </th>
                        <th class="border border-gray-300 px-4 py-2 text-left">
                            Email
                        </th>
                        <th class="border border-gray-300 px-4 py-2 text-left">
                            Действия
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="user in users"
                        :key="user.id"
                        class="hover:bg-gray-50"
                    >
                        <td class="border border-gray-300 px-4 py-2">
                            {{ user.name }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ user.email }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <button
                                class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition duration-300"
                                @click.prevent="destroy(user.id)"
                            >
                                Удалить
                            </button>
                        </td>
                    </tr>
                    <tr v-if="!users.length">
                        <td
                            colspan="2"
                            class="text-center py-4 text-gray-500 border border-gray-300"
                        >
                            Нет пользователей для отображения
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Index",
    data() {
        return {
            users: [],
        };
    },
    mounted() {
        this.getItems();
    },
    methods: {
        getItems() {
            axios
                .get("/api/admin/user/")
                .then((response) => {
                    this.users = response.data.users;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        destroy(id) {
            this.loading = true;

            axios
                .delete("/api/admin/user/destroy/" + id)
                .then((response) => {
                    this.getItems();
                    this.loading = false;
                })
                .catch((error) => {
                    this.loading = false;
                    console.log(error);
                });
        },
    },
};
</script>
