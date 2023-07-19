<script setup>

import {computed, ref} from "vue";
import {useForm, usePage} from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";

const user = computed(() => usePage().props.auth.user);

const props = defineProps({
    docente: Object,
    carrera: Array,
    departamento: Array,
    tipo_plaza: Array,
    puesto: Array,
});
const form = useForm({
    id: user.value.id,
    rfc: "",
    curp: "",
    nombre: "",
    apellidoPat: "",
    apellidoMat: "",
    sexo: null,
    email: null,
    telefono: "",
    carrera_id: null,
    id_puesto: null,
    tipo_plaza: null,
    departamento_id: null,
});

const sex = [{value: 1, text: "M"}, {value: 2, text: "F"}]
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Información personal</h2>

            <p class="mt-1 text-sm text-gray-600">
                Actualizar tu información personal
            </p>
        </header>
        <form class="mt-6 space-y-6">
            <div>
                <InputLabel for="nombre" value="Nombre" />

                <TextInput
                    id="nombre"
                    type="text"
                    class="mt-1 rounded w-full"
                    v-model="form.nombre"
                    required
                />

                <InputError class="mt-2" />
            </div>
            <div>
                <InputLabel for="apellido_pat" value="Apellido Paterno" />

                <TextInput
                    id="apellido_pat"
                    type="text"
                    class="mt-1 rounded w-full"
                    v-model="form.apellidoPat"
                    required
                />

                <InputError class="mt-2" />
            </div>
            <div>
                <InputLabel for="apellido_mat" value="Apellido Materno" />

                <TextInput
                    id="apellido_mat"
                    type="text"
                    class="mt-1 rounded w-full"
                    v-model="form.apellidoMat"
                    required
                />

                <InputError class="mt-2" />
            </div>
            <div>
                <InputLabel for="sexo" value="Sexo" />

                <v-select :items="sex" item-title="text" item-value="value">

                </v-select>
            </div>
            <div>
                <InputLabel for="curp" value="CURP" />

                <TextInput
                    id="CURP"
                    type="text"
                    class="mt-1 rounded w-full"
                    v-model="form.curp"
                    required
                />

                <InputError class="mt-2" />
            </div>
        </form>
    </section>
</template>

<style scoped>

</style>
