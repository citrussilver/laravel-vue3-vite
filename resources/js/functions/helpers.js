import { usePage } from '@inertiajs/vue3';

export const getUser = () => {
    return usePage().props.auth.user;
}