<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Carrera</h2>
        </template>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 mt-7 sm:p-8 bg-white shadow sm:rounded-lg">
                <form class="mt-6 space-y-6" @submit.prevent="form.put(route('update.carrera', props.carrera.id))">
                        <v-container>
                            <v-row justify="center">
                                <v-col cols="12">
                                    <InputLabel for="nombre_carrera" value="Nombre de la carrera"/>
                                    <v-text-field v-model="form.nameCarrera"></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                    <InputLabel for="presidente_academia" value="Presidente de la academia"/>
                                    <v-autocomplete v-model="form.presidente_academia" :items="props.docente" item-title="nombre" item-value="id"></v-autocomplete>
                                </v-col>
                                <v-col cols="12">
                                    <InputLabel for="presidente_academia" value="Departamento al que la carrera pertenece"/>
                                    <v-select v-model="form.departamento_id" :items="props.departamento" item-value="id" item-title="nameDepartamento"></v-select>
                                </v-col>
                            </v-row>
                        </v-container>
                        <v-divider></v-divider>
                            <v-row class="justify-end">
                                <v-col cols="2">
                                    <PrimaryButton>Guardar</PrimaryButton>
                                </v-col>
                            </v-row>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {useForm} from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import {onMounted} from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";


const form = useForm({
    departamento_id: null,
    nameCarrera: "",
    presidente_academia: null
})
const props = defineProps({
    carrera: {
        type: Object
    },
    docente: {
        type: Array
    },
    departamento: {
        type: Array
    }
});

onMounted(() => {
    if (!props.carrera){
        return form;
    }else{
            form.nameCarrera = props.carrera.nameCarrera
            form.departamento_id = props.carrera.departamento_id
            form.presidente_academia = props.carrera.presidente_academia
    }
})
</script>

<style scoped>

</style>
