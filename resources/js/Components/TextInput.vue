<template>
    <div class="mt-2">
        <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-900">{{ name.toLocaleUpperCase() }}</label>
        <div class="mt-2">
            <input :type="type" v-model="model" :class="[
                'block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1   placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm',
                { ' outline-red-500': message }
            ]" />
        </div>
        <small class="text-red-500" v-if="message">{{ message }}</small>

    </div>
</template>
<script setup>
const model = defineModel({
    type: null,
    required: true
})
defineProps({
    name: {
        type: String,
        required: true
    },
    type: {
        type: String,
        defeault: 'text'
    },
    message: String
})
</script>
