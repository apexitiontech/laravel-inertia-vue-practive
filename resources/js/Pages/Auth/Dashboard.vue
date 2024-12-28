<template>
    <div class="overflow-x-auto">
        <div class="p-4 bg-green-600 text-white" v-if="$page.props.flash.success">
            {{ $page.props.flash.success }}
        </div>
        <table
            class="min-w-full table-auto bg-white border border-gray-300 rounded-lg shadow-md"
        >
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Created At</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="user in users.data"
                    :key="user.id"
                    class="border-b hover:bg-gray-50"
                >
                    <td class="px-6 py-4">{{ user.name }}</td>
                    <td class="px-6 py-4">{{ user.email }}</td>
                    <td class="px-6 py-4">{{ getDate(user.created_at) }}</td>
                </tr>
            </tbody>
        </table>
        <!-- pagination -->
        <div class="pagination flex justify-between items-center mt-10">
            <Link
                v-for="link in users.links"
                v-html="link.label"
                :key="link.url"
                :href="link.url ? link.url : '#'"
                class="px-4 py-2"
                :class=" link.active
                        ? 'bg-gray-900 text-white'
                        : 'text-gray-300 hover:bg-gray-700 hover:text-white'
                "
            >
            </Link>
            <div class="showing">
                Showing {{ users.from }} to {{ users.to }} of {{ users.total }}
                results
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    users: Object,
});
const getDate = (date) => {
    return new Date(date).toLocaleDateString("en-US", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
};
</script>
