<template>
    <Head :title="`| ${$page.props.title || $page.component}`" />
    <div>
        <h1 class="bg-green-600 text-gray-50 p-4" v-if="$page.props.auth?.user">
            <img
                v-if="$page.props.auth.user.avatar"
                class="w-20 h-20 rounded-full"
                :src="`/storage/${$page.props.auth.user.avatar}`"
                alt="User Avatar"
            />
            {{ $page.props.auth.user.name }} You Are Logged In
        </h1>
        <h1 class="bg-red-600 text-gray-50 p-4" v-else>
            You Are Logged Out
        </h1>
    </div>
</template>

<script setup>
const props = defineProps({
    name: String,
});
</script>
