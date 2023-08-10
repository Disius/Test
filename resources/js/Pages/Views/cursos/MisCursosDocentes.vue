<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {computed} from "vue";
import {Head} from "@inertiajs/vue3";
import TablaMisCursoDocente from "@/Pages/Views/cursos/tablas/TablaMisCursoDocente.vue";

const props = defineProps({
    docente: Object,
    auth: Object
});


</script>

<template>
    <Head title="Mis Cursos"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-lg font-medium text-gray-900">Mis Cursos</h2>
        </template>
        <div class=" mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 mt-7 sm:p-8 bg-white shadow sm:rounded-lg">
                <TablaMisCursoDocente :curso="props.docente" :user="props.auth"></TablaMisCursoDocente>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
