<script setup>

import PrimaryButton from "@/Components/PrimaryButton.vue";
import {computed} from "vue";

const props = defineProps({
    cursos: Array
})


const formatFechaF = computed(() => {
    let date = null
    for (let i of props.cursos){
        date = new Date(i.fecha_F).toLocaleDateString('es-MX')
    }
    return date;
});
// Computed propierties


const formatFechaI = computed(() => {
    let date = null
    for (let i of props.cursos){
        date = new Date(i.fecha_I).toLocaleDateString('es-MX')
    }
    return date;
});


function iterar(){
    let i = 0

    for (i; i<=26,3;i++){
        console.log(i)
    }


}
iterar()
</script>

<template>
    <v-table fixed-header height="500px" hover>
        <thead>
            <tr>
                <th class="text-left">Nombre de los
                    Cursos</th>
                <th class="text-left">Objetivo</th>
                <th class="text-left">Fecha de
                    realización</th>
                <th class="text-left">Lugar
                    (presencial
                    o virtual)
                </th>
                <th class="text-left">Horario
                </th>
                <th class="text-left">Dirigido</th>
                <th class="text-left">Tipo de Curso</th>
                <th class="text-left">
                    Periodo de Realización
                </th>
                <th class="text-left">
                    Objetivo de la actividad o evento
                </th>
                <th class="text-left">
                    Facilitadores que impartiran el curso
                </th>
                <th class="text-left">

                </th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="curso in props.cursos"
                :key="curso.id"

            >
                <td class="v-card--hover">
                    {{ curso.nombreCurso }}
                </td>
                <td class="v-card--hover">
                    {{ curso.objetivoEvento }}
                </td>
                <td class="v-card--hover">
                    {{ formatFechaI }}  {{formatFechaF}}
                </td>
                <td class="v-card--hover">
                    <template v-if="curso.modalidad === 1">
                        <span>Virtual</span>
                    </template>
                    <template v-if="curso.modalidad === 2">
                        <span>Presencial</span>
                    </template>
                    <template v-if="curso.modalidad === 3">
                        <span>Hibrído</span>
                    </template>
                </td>
                <td class="v-card--hover">
                    {{ curso.hora_I }} a {{curso.hora_F}}
                </td>
                <td class="v-card--hover">
                    {{ curso.carrera.nameCarrera }}
                </td>
                <template v-if="curso.tipo_FDoAP === 1">
                    <td class="v-card--hover">
                        FORMACIÓN DOCENTE
                    </td>
                </template>
                <template v-if="curso.tipo_FDoAP === 2">
                    <td class="v-card--hover">
                        ACTUALIZACIÓN PROFESIONAL
                    </td>
                </template>
                <template v-if="curso.periodo === 1">
                    <td class="v-card--hover">ENERO-JUNIO</td>
                </template>
                <template v-if="curso.periodo === 2">
                    <td class="v-card--hover">
                        AGOSTO-DICIEMBRE
                    </td>
                </template>
                <td class="v-card--hover">

                </td>
                <td class="v-card--hover">
                    <template
                        v-for="facilitador in curso.deteccion_facilitador"
                    >
                        <br> • {{facilitador.nombre}} {{facilitador.apellidoPat}} {{facilitador.apellidoMat}}
                    </template>
                </td>
                <td class="v-card--hover">
                    <PrimaryButton>
                        Inscribirme
                    </PrimaryButton>
                </td>
            </tr>
        </tbody>
    </v-table>
</template>

<style scoped>

</style>
