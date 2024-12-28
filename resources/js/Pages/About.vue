<template>
    <Head :title="name"/>
        <div>
            <h1>About Page {{ name }}</h1>
        </div>
</template>

<script setup>
const props = defineProps({
    name: String
});
</script>
