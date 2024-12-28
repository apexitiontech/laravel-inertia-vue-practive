<template>
    <Head>
        <title>Practice</title>
        <meta name="description" content="Practice" />
    </Head>
    <header>
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <!-- Mobile menu button -->
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>

                    <!-- Logo -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-auto"
                                src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
                                alt="Your Company" />
                        </div>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                        <!-- Left Links -->
                        <div class="flex space-x-4">
                            <Link :href="route('home')" :class="[
                                route().current('home')
                                    ? 'bg-gray-900 text-white'
                                    : 'text-gray-300 hover:bg-gray-700 hover:text-white',
                                'rounded-md px-3 py-2 text-sm font-medium'
                            ]">
                                Home
                            </Link>
                            <Link :href="route('about')" :class="[
                                route().current('about')
                                    ? 'bg-gray-900 text-white'
                                    : 'text-gray-300 hover:bg-gray-700 hover:text-white',
                                'rounded-md px-3 py-2 text-sm font-medium'
                            ]">
                                About
                            </Link>
                        </div>

                        <!-- Right Links -->
                        <div class="flex space-x-4">
                            <div v-if="$page.props.auth.user">
                                <Link :href="route('logout')" method="post" type="button" as="button" :class="[
                                    'text-gray-300 hover:bg-gray-700 hover:text-white',
                                    'rounded-md px-3 py-2 text-sm font-medium'
                                ]">
                                    Logout
                                </Link>
                                <Link :href="route('dashboard')"  :class="[
                                    route().current('dashboard')
                                        ? 'bg-gray-900 text-white'
                                        : 'text-gray-300 hover:bg-gray-700 hover:text-white',
                                    'rounded-md px-3 py-2 text-sm font-medium'
                                ]">
                                    Dashboard
                                </Link>
                            </div>
                            <div v-else>
                                <Link :href="route('register')" :class="[
                                    route().current('register')
                                        ? 'bg-gray-900 text-white'
                                        : 'text-gray-300 hover:bg-gray-700 hover:text-white',
                                    'rounded-md px-3 py-2 text-sm font-medium'
                                ]">
                                    Register
                                </Link>
                                <Link :href="route('login')" :class="[
                                    route().current('login')
                                        ? 'bg-gray-900 text-white'
                                        : 'text-gray-300 hover:bg-gray-700 hover:text-white',
                                    'rounded-md px-3 py-2 text-sm font-medium'
                                ]">
                                    Login
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="p-4">
        <slot />
    </main>
</template>

<script setup>
</script>

<style>
h1 {
    color: blue;
}
</style>
