<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import NavLink from "@/Components/NavLink.vue";


const props = defineProps({
    detecciones: {
        type: Array
    }
})
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Detecciones"/>

        <v-container>
            <v-row justify="end">
                <v-col cols="2">
                    <NavLink :href="route('detecciones.create')" :active="route().current('detecciones.create')">
                        <PrimaryButton>CREAR DETECCION DE NECESIDADES</PrimaryButton>
                    </NavLink>
                </v-col>
                <v-col cols="3">
                    <NavLink :href="route('index.registros')" :active="route().current('index.registros')">
                        <PrimaryButton>Todos los registros</PrimaryButton>
                    </NavLink>
                </v-col>
            </v-row>
        </v-container>


        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <v-card elevation="0">
                        <v-table
                            fixed-header
                            height="300px"

                        >
                            <thead>
                            <tr>
                                <th class="text-left">
                                    Nombre del curso
                                </th>
                                <th class="text-left">
                                    Contenido tematicos
                                </th>
                                <th class="text-left">
                                    Periodo de Realización
                                </th>
                                <th class="text-left">
                                    Objetivo de la actividad o evento
                                </th>
                                <th class="text-left">Estado</th>
                                <th class="text-left">
                                    Ver
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr
                                v-for="deteccion in props.detecciones"
                                :key="deteccion.id"

                            >

                                <td class="v-card--hover">{{deteccion.nombreCurso}}</td>
                                <td class="v-card--hover">{{deteccion.contenidosTM}}</td>
                                <template v-if="deteccion.periodo === 1">
                                    <td class="v-card--hover">ENERO-JUNIO</td>
                                </template>
                                <template v-if="deteccion.periodo === 2">
                                    <td class="v-card--hover">AGOSTO-DICIEMBRE</td>
                                </template>
                                <td class="v-card--hover">{{deteccion.objetivoEvento}}</td>
                                <td class="ma-4 pa-4">
                                    <!-- <Estado :estadoDeteccion="props.detecciones"/> -->
                                    <template v-if="deteccion.obs === 1">
                                        <v-alert
                                            type="warning"

                                        >
                                            <p>Observaciones</p>
                                        </v-alert>
                                    </template>
                                    <template v-else>
                                        <v-alert
                                            type="info"
                                        >
                                            <p>Sin revisar</p>
                                        </v-alert>
                                    </template>
                                </td>
                                <td>
                                    <NavLink :href="route('show.detecciones', deteccion.id)" type="button" as="button">
                                        <v-btn icon color="blue">
                                            <v-icon>mdi-eye-arrow-right-outline</v-icon>
                                        </v-btn>
                                    </NavLink>
                                </td>
                            </tr>
                            </tbody>
                        </v-table>
                    </v-card>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
