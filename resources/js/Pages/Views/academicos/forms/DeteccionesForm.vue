<script setup>

import {ref} from "vue";
import {useForm} from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";

const props = defineProps({

});
let exist = ref(null)
const dialog = ref(true);
const form = useForm({
    AsignaturasFA: "",
    ContenidoTFA: "",
    Numprofesores: null,
    periodo: null,
    facilitadores: [],
    nombreCT: "",
    fecha_I: "",
    fecha_F: "",
    hora_I: "",
    hora_F: "",
    objetivo: "",
    tipo: null,
    tipo_act: null,
    dirigido: null,
    modalidad: null,
    id_jefe: null,
    facilitador_externo: ""
});

const tipoSolicitud = ref([
    {text: "FORMACIÓN DOCENTE", value:1},
    {text: "ACTUALIZACIÓN PROFESIONAL", value:2}
]);
const modalidad = [
    {text: "Virtual", value:1},
    {text: "Presencial", value:2},
    {text: "Híbrido", value:3},
];
const tipoCurso = ref([
    {value:1, text:"TALLER"},
    {value:2, text:"CURSO"},
    {value:3, text:"CURSO-TALLER"},
    {value:4, text:"FORO"},
    {value:5, text:"SEMINARIO"}
]);
const period = ref([
    {text: "ENERO-JUNIO", value: 1},
    {text: "AGOSTO-DICIEMBRE", value: 2},
]);

</script>

<template>
    <section>
        <v-dialog v-model="dialog" width="500" persistent>
            <v-card width="500" height="300">
                <v-card-title class="text-center">Tipo de diagnostico que desea realizar</v-card-title>
                <v-divider></v-divider>
                <v-card-text>
                    <v-container class="mt-6">
                        <InputLabel for="tipo_solicitud" value="Tipo de solicitud" />
                        <v-row align="center" justify="center" class="mt-2">
                            <v-select :items="tipoSolicitud" item-title="text" item-value="value"
                                      v-model="form.tipo">

                            </v-select>
                        </v-row>
                    </v-container>
                </v-card-text>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-row justify="end" class="">
                        <v-col cols="4" align-self="center">
                            <v-btn prepend-icon="mdi-check-circle" color="green" size="" @click="dialog = false">
                                Aceptar
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <v-row justify="center">
                <template v-if="form.tipo != null">
                    <v-container class="mt-5">
                        <v-row justify="center">
                            <template v-if="form.tipo === 1">
                                <v-col cols="12" align-self="center">
                                    <v-text-field v-model="form.AsignaturasFA" label="Dimensión(es) en la(s) que se requiere Formación Docente">

                                    </v-text-field>
                                </v-col>
                                <!--                                <v-col cols="6">-->
                                <!--                                    <v-text-field label="Competencia(s) en la(s) que se requiere la Formación Docente">-->

                                <!--                                    </v-text-field>-->
                                <!--                                </v-col>-->
                                <v-col cols="6">
                                    <v-textarea label="Competencia(s) en la(s) que se requiere la Formación Docente" v-model="form.ContenidoTFA" >

                                    </v-textarea>
                                </v-col>
                            </template>
                            <template v-if="form.tipo === 2">
                                <v-col cols="12" align-self="center">
                                    <v-text-field label="Asignatura(s) en la(s) que se requiere Actualización profesional" v-model="form.AsignaturasFA">

                                    </v-text-field>
                                </v-col>
                                <!--                                <v-col cols="6">-->
                                <!--                                    <v-text-field label="Contenidos temáticos en que se requiere Actualización Profesional">-->

                                <!--                                    </v-text-field>-->
                                <!--                                </v-col>-->
                                <v-col cols="6">
                                    <v-textarea label="Contenidos temáticos en que se requiere Actualización Profesional" v-model="form.ContenidoTFA" >

                                    </v-textarea>
                                </v-col>
                            </template>
                            <!--                            <v-row justify="start" class="ml-3">-->
                            <!--                                <v-tooltip-->
                            <!--                                    location="right"-->
                            <!--                                >-->
                            <!--                                    <template v-slot:activator="{ props }">-->
                            <!--                                        <v-btn-->
                            <!--                                            icon-->
                            <!--                                            v-bind="props"-->
                            <!--                                            size="x-large"-->
                            <!--                                            @click=""-->
                            <!--                                        >-->
                            <!--                                            <v-icon color="blue-lighten-1">-->
                            <!--                                                mdi-help-->
                            <!--                                            </v-icon>-->
                            <!--                                        </v-btn>-->
                            <!--                                    </template>-->
                            <!--                                    <span>Si las competencias o contenidos son en lista y llevan por favor usar el campo de texto grande</span>-->
                            <!--                                </v-tooltip>-->
                            <!--                            </v-row>-->
                        </v-row>
                        <v-row justify="center">
                            <v-col cols="6">
                                <v-text-field label="Número de profesores(as)" v-model="form.Numprofesores" >

                                </v-text-field>
                            </v-col>
                            <v-col cols="6">
                                <v-select label="Periodo de realización (enero-junio o agosto-diciembre)" v-model="form.periodo" :items="period" item-title="text" item-value="value">

                                </v-select>
                            </v-col>
                            <v-col cols="6">
                                <v-select label="Modalidad" :items="modalidad" item-title="text" item-value="value" v-model="form.modalidad" >

                                </v-select>
                            </v-col>
                            <v-col cols="6">
                                <v-select label="Tipo de curso" :items="tipoCurso" item-title="text" item-value="value" v-model="form.tipo_act" >

                                </v-select>
                            </v-col>
                            <v-col cols="12">
                                <v-select label="Carrera a la que va dirigida" :items="carreraFilter" item-title="nameCarrera" item-value="id" v-model="form.dirigido">

                                </v-select>
                            </v-col>
                            <v-col >
                                <v-autocomplete label="Facilitadores">

                                </v-autocomplete>
                            </v-col>
                            <v-col cols="1" align-self="center">
                                <v-tooltip
                                    location="top"
                                >
                                    <template v-slot:activator="{ props }">
                                        <v-btn
                                            icon
                                            v-bind="props"
                                            size="small"
                                            @click="exist = !exist"
                                        >
                                            <v-icon color="blue-lighten-1">
                                                mdi-help
                                            </v-icon>
                                        </v-btn>
                                    </template>
                                    <span>Si el facilitador es una institución</span>
                                </v-tooltip>
                            </v-col>
                            <v-col  align-self="center">
                                <v-text-field label="Faciltador" :disabled="!exist" v-model="form.facilitador_externo"></v-text-field>
                            </v-col>
                            <v-col cols="12">
                                <v-text-field label="Nombre del curso, taller, conferencias, etc." v-model="form.nombreCT" :rules="textRules">

                                </v-text-field>
                            </v-col>
                            <v-col cols="6">
                                <h4>Elegir las fechas en que se
                                    realizará la actividad
                                    o evento</h4>
                                <v-row justify="center">
                                    <v-col cols="6">
                                        <v-text-field type="date" v-model="form.fecha_I"/>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field type="date" v-model="form.fecha_F"/>
                                    </v-col>
                                </v-row>
                            </v-col>
                            <v-col cols="6">
                                <h4>Elegir los horarios en que
                                    se realizará la
                                    actividad o
                                    evento</h4>
                                <v-row justify="center">
                                    <v-col cols="6">
                                        <v-text-field type="time" v-model="form.hora_I"></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field type="time" v-model="form.hora_F"/>
                                    </v-col>
                                </v-row>
                            </v-col>
                            <v-col align-self="center" cols="12">
                                <v-text-field v-model="form.objetivo" label="Objetivo de la actividad o evento" >

                                </v-text-field>
                            </v-col>
                        </v-row>
                    </v-container>
                </template>
        </v-row>
    </section>
</template>

<style scoped>

</style>
