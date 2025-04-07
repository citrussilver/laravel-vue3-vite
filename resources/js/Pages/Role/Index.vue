<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    roles: {
        type: Array,
        required: true
    }
})
</script>

<template>
    <Head title="Roles" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Roles
            </h2>
        </template>
        
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Manage Roles</div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Role Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="role in roles" :key="role.id" class="bg-white border-b hover:bg-gray-50">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ role.name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ role.description }}
                                    </td>
                                    <td class="px-6 py-4 space-x-2">
                                        <a href="#" class="font-medium text-gray-600 hover:underline">Show</a>
                                        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                        <a href="#" class="font-medium text-red-600 hover:underline">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Temporary Pagination Template -->
                        <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between py-2 px-4" aria-label="Table navigation">
                            <span class="text-sm font-normal text-gray-700 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing <span class="font-semibold text-gray-700">1-3</span> of <span class="font-semibold text-gray-700">1</span></span>
                            <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                                <li>
                                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 hover:text-gray-700">1</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>