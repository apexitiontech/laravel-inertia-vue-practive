<template>
    <Head :title="`| Login`" />
    <div class="register-wrapper">
        <div
            class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8"
        >
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img
                    class="mx-auto h-10 w-auto"
                    src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Your Company"
                />
                <h2
                    class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900"
                >
                    Login
                </h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" @submit.prevent="submit" method="POST">
                  
                    <TextInput
                        name="email"
                        v-model="form.email"
                        type="email"
                        :message="form.errors.email"
                    />
                    <TextInput
                        name="password"
                        v-model="form.password"
                        type="password"
                        :message="form.errors.password"
                    />

                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <input
                                type="checkbox"
                                id="remember"
                                v-model="form.remember"
                            />
                            <label for="remember" class="text-slate-600"
                                >Remember Me</label
                            >
                        </div>
                        <div class="text-slate-500">
                            Need An Account?
                            <a :href="route('register')" class="text-blue-400"
                                >Register</a
                            >
                        </div>
                    </div>

                    <div>
                        <Button>Login</Button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import TextInput from "../../Components/TextInput.vue";
import Button from "../../Components/Button.vue";

const form = useForm({
    email: null,
    password: null,
    remember: null,
});

const submit = () => {
    form.post(route("login.store"), {
        onError: () => {
            form.reset("password", "remember");
        },
    });
};
</script>
