<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DeteccionesForm from "@/Pages/Views/academicos/forms/DeteccionesForm.vue";
import {ref} from "vue";
import DeteccionesEditForm from "@/Pages/Views/academicos/forms/DeteccionesEditForm.vue";

const props = defineProps({
    deteccion: Object,
    carrera: Array,
    docentes: Array
})
// const dialog = ref(true);
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Deteccion de Necesidades</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <DeteccionesEditForm :deteccion="props.deteccion" :carrera="props.carrera" :docentes="props.docentes"></DeteccionesEditForm>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
