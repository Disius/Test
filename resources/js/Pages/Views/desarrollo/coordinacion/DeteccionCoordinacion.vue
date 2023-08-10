<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import TablaDetecciones from "@/Pages/Views/desarrollo/tablas/TablaDetecciones.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import NavLink from "@/Components/NavLink.vue";


const props = defineProps({
    detecciones: Array,
})

</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Deteccion de Necesidades</h2>
        </template>

        <v-row justify="end" class="mt-2">
            <v-col cols="2">
                <NavLink :href="route('index.registros.c')" as="button">
                    <PrimaryButton>Ver todos los registros</PrimaryButton>
                </NavLink>
            </v-col>
        </v-row>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <TablaDetecciones :detecciones="props.detecciones"></TablaDetecciones>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
