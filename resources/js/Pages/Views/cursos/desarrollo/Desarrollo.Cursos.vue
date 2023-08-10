<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import TablaCursoAcademico from "@/Pages/Views/cursos/tablas/TablaCursoAcademico.vue";

const props = defineProps({
  cursos: Array,
  auth: Object,
})
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-lg font-medium text-gray-900">Cursos</h2>
    </template>

    <div class=" mx-auto sm:px-6 lg:px-8 space-y-6">
      <div class="p-4 mt-7 sm:p-8 bg-white shadow sm:rounded-lg">

      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>

</style>
