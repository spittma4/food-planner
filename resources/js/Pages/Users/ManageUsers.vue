<template>
    <Head title="User Management Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User Management Dashboard
            </h2>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- TODO: Make this a normal button  -->
                        <BreezeNavLink class="ml-4" :href="route('createUser')" :active="route().current('dashboard')">
                            Create User
                        </BreezeNavLink>
                    </div>
                </div>
                <div>
                    <!-- TODO: Make this an actual table..                   -->
                    {{users}}
                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import BreezeNavLink from '@/Components/NavLink.vue'
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        Head,
    },
    props: {
        users: Array,
    }
}
</script>
