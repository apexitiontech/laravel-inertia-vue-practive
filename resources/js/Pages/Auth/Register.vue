<template>

    <Head :title="`| Register`" />
    <div class="register-wrapper">
        <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-10 w-auto"
                    src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
                <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account
                </h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" @submit.prevent="submit" method="POST">

                    <div>
                        <label for="avatar">Avatar</label>
                        <input
                            type="file"
                            id="avatar"
                            name="avatar"
                            @input="change"
                            accept="image/*"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm"
                        />
                    </div>
                    <TextInput name="name" v-model="form.name" :message="form.errors.name" />
                    <TextInput name="email" v-model="form.email" type="email" :message="form.errors.email" />
                    <TextInput name="password" v-model="form.password" type="password"
                        :message="form.errors.password" />
                    <TextInput name="confirm password" v-model="form.password_confirmation" type="password" />

                    <div>
                       <Button>Register</Button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../../Components/TextInput.vue';
import Button from '../../Components/Button.vue';

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
    avatar: null,
});
const change = (e) => {
    form.avatar = e.target.files[0];
};
const submit = () => {
    form.post(route('register.store'), {
        onError: () => {
            form.reset('password', 'password_confirmation');
        },
    });
};
</script>
