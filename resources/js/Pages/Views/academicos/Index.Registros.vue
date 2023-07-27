<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Registros de deteccion de necesidades</h2>
        </template>


    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    detecciones: {
        type: Array
    }
})
</script>

<style scoped>

</style>
