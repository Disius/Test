<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import {Head, usePage} from '@inertiajs/vue3';
import DocenteInfo from "@/Pages/Profile/Partials/DocenteInfo.vue";
import {computed} from "vue";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
    departamento: {
        type: Array
    },
    docente: {
        type: Object
    },
    tipo_plaza: {
        type: Array,
    },
    puesto: {
        type: Array
    },
    carrera: {
        type: Array,
    },
});
const user = computed(() => usePage().props.auth.user);
</script>

<template>
    <Head title="Perfil" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Perfil</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <template v-if="user.role === 1">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <UpdateProfileInformationForm
                            :must-verify-email="mustVerifyEmail"
                            :status="status"
                            class="max-w-xl"
                        />
                    </div>
                </template>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <DocenteInfo :docente="docente" :carrera="carrera" :departamento="departamento"
                    :puesto="puesto" :tipo_plaza="tipo_plaza" class="max-w-xl"
                    />
                </div>
                <template v-if="user.role === 1">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <UpdatePasswordForm class="max-w-xl" />
                    </div>
                </template>

                <template v-if="user.role === 1">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <DeleteUserForm class="max-w-xl" />
                    </div>
                </template>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
