<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import TablaCursoAcademicoInscritos from "@/Pages/Views/cursos/tablas/TablaCursoAcademicoInscritos.vue";
import {Head} from "@inertiajs/vue3";
const props = defineProps({
    curso: Object
})
</script>

<template>
    <Head title="Cursos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-lg font-medium text-gray-900">{{curso.nombreCurso}}</h2>
        </template>
        <div class=" mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 mt-7 sm:p-8 bg-white shadow sm:rounded-lg">
                <TablaCursoAcademicoInscritos :curso="props.curso" :user="props.auth"></TablaCursoAcademicoInscritos>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


<style scoped>

</style>
