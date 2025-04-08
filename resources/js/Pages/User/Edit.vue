<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import FormInputLabel from '@/Components/FormInputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import AltButton from '@/Components/AltButton.vue';
import ElementGrouper from '@/Components/ElementsGrouper.vue';
import BlockWideElementsGrouper from '@/Components/BlockWideElementsGrouper.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';

const props = defineProps({
    roles: {
        type: Array,
        required: true
    },
    user: {
        type: Object,
        required: true
    }
})

const form = useForm({...props.user, role_id: props.user.role.id})

const update = () => {
    form.role = props.roles.find(role => form.role_id === role.id)

    form.put(route('users.update', form.id), {
        onSuccess: () => form.reset(),
    });
};

</script>

<template>
    <Head title="Edit User" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit User
            </h2>
        </template>
        
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-center justify-center">
                    <div class="relative w-full max-w-2xl max-h-full">

                        <!-- Form -->
                        <form class="relative bg-white rounded-lg shadow" @submit.prevent="update">
                            <div class="p-6 space-y-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-6">
                                        <FormInputLabel for="full_name" value="Full Name" />
                                        <TextInput
                                            id="full_name"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.full_name"
                                            required
                                            autofocus
                                            autocomplete="name"
                                        />
                                    </div>
                                    <ElementGrouper>
                                        <FormInputLabel for="email" value="Email" />
                                        <TextInput
                                            id="email"
                                            type="email"
                                            class="mt-1 block w-full"
                                            v-model="form.email"
                                            required
                                        />
                                        <InputError class="mt-2" :message="form.errors.email" />
                                    </ElementGrouper>
                                    <ElementGrouper>
                                        <FormInputLabel for="role_id" value="Role" />
                                        <select name="role_id" v-model="form.role_id" id="role_id" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
                                            <option value="-1" disabled>-- Select a role --</option>
                                            <option v-for="role in roles" :key="role.id" :value="role.id">{{ role.name }}</option>
                                        </select>
                                    </ElementGrouper>

                                    <BlockWideElementsGrouper>
                                        <AltButton
                                            :class="{ 'opacity-25': form.processing }"
                                            :disabled="form.processing"
                                        >
                                            Save
                                        </AltButton>
                                        <Link :href="route('users.index')" as="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5">Cancel</Link>
                                    </BlockWideElementsGrouper>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>