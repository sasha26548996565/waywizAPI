<template>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold text-center mb-6">Список сообщений</h1>
        <div class="overflow-x-auto">
            <table
                class="table-auto w-full border-collapse border border-gray-200"
            >
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 text-left">
                            Сообщение
                        </th>
                        <th class="border border-gray-300 px-4 py-2 text-left">
                            Отправитель
                        </th>
                        <th class="border border-gray-300 px-4 py-2 text-left">
                            Дата
                        </th>
                        <th class="border border-gray-300 px-4 py-2 text-left">
                            Действия
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="message in messages"
                        :key="message.id"
                        class="hover:bg-gray-50"
                    >
                        <td class="border border-gray-300 px-4 py-2">
                            {{ message.text }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ message.is_user ? message.user.name : "Бот" }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{
                                $dayjs(message.created_at).format(
                                    "DD.MM.YYYY HH:mm:ss"
                                )
                            }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <button
                                class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition duration-300"
                                @click.prevent="destroy(message.id)"
                            >
                                Удалить
                            </button>
                        </td>
                    </tr>
                    <tr v-if="!messages.length">
                        <td
                            colspan="3"
                            class="text-center py-4 text-gray-500 border border-gray-300"
                        >
                            Нет сообщений для отображения
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
    name: "MessageIndex",
    data() {
        return {
            messages: [],
        };
    },
    mounted() {
        this.getItems();
    },
    methods: {
        getItems() {
            axios
                .get("/api/admin/message/")
                .then((response) => {
                    this.messages = response.data.messages;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        destroy(id) {
            this.loading = true;

            axios
                .delete("/api/admin/message/destroy/" + id)
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
