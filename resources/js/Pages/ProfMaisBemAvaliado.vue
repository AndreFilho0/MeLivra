<!-- Componente para as tabelas professor melhor avaliado e Último Comentario -->
<template>
  <div class="flex justify-between w-full mt-3 px-2">
    <div class="justify-center w-full mx-2 rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
      <h2 class="text-center text-2xl font-medium text-gray-900 dark:text-white">Professor melhor avaliado</h2>
      <p class="text-center">
        {{ professor.nomeProfessor }} é um professor legal.
      </p>
    </div>

    <div class="justify-center w-full mx-2 rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
      <h2 class="text-center text-2xl font-medium text-gray-900 dark:text-white">Último comentário</h2>
      <p class="text-center" >
        {{ comentario.comentario }}
      </p>
    </div>
  </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
  const professor = ref({});
  const comentario = ref({});

  onMounted(() => {
    professor.value = usePage().props.professor || {}; 
    comentario.value = usePage().props.comentario || {};
    console.log(professor.value);
    console.log(comentario.value);
  });
</script>
