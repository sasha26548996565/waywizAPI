<template>
    <div class="mt-4 mb-4">
        <router-link
            :to="{ name: 'admin.user.index' }"
            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700"
        >
            Пользователи
        </router-link>
        <router-link
            :to="{ name: 'admin.message.index' }"
            class="ml-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700"
        >
            Сообщения
        </router-link>
    </div>

    <router-view></router-view>
</template>

<script>
export default {
    name: "Index"
}
</script>
