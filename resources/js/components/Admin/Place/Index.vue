<template>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold text-center mb-6">
            Список мест
        </h1>
        <div class="overflow-x-auto">
            <table
                class="table-auto w-full border-collapse border border-gray-200"
            >
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 text-left">
                            Категория
                        </th>
                        <th class="border border-gray-300 px-4 py-2 text-left">
                            Название
                        </th>
                        <th class="border border-gray-300 px-4 py-2 text-left">
                            Описание
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="place in places"
                        :key="place.id"
                        class="hover:bg-gray-50"
                    >
                        <td class="border border-gray-300 px-4 py-2">
                            {{ place.industry.name }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ place.name }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ place.description }}
                        </td>
                    </tr>
                    <tr v-if="!places.length">
                        <td
                            colspan="3"
                            class="text-center py-4 text-gray-500 border border-gray-300"
                        >
                            Нет мест для отображения
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
    name: "PlaceIndex",
    data() {
        return {
            places: [],
        };
    },
    mounted() {
        axios
            .get("/api/admin/place/")
            .then((response) => {
                this.places = response.data.places;
            })
            .catch((error) => {
                console.log(error);
            });
    },
};
</script>
