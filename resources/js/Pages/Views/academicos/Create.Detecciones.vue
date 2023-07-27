<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DeteccionesForm from "@/Pages/Views/academicos/forms/DeteccionesForm.vue";
import {ref} from "vue";

const props = defineProps({
    base_docente: {
        type: Array,
    },
    carrera_filtro: {
        type: Array
    },
    todos_los_departamentos: {
        type: Array
    }
})
// const dialog = ref(true);
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nueva Deteccion de Necesidades</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <DeteccionesForm :carrera="props.carrera_filtro" :todos_los_departamentos="props.todos_los_departamentos" :docente="props.base_docente"></DeteccionesForm>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
