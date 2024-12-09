<!-- Componente para as tabelas professor melhor avaliado e Último Comentario -->
<template>
  <div class="flex justify-between w-full mt-3 px-2">
    <div class="
        justify-center 
        w-full 
        mx-2 
        rounded-lg 
        border
        p-2
        shadow-xl
        border-gray-300 
        bg-gray-100">
      <h2 class="text-center text-xl font-bold text-black dark:text-white">Melhores professores</h2>
      <p v-for="(prof, index) in professor" :key="index" class="text-justify pl-3">
        {{ index + 1 }}. {{ prof.nomeProfessor }} do {{ prof.instituto }} com {{ prof.Nota }}
      </p>
    </div>

    <div class="
        justify-center 
        w-full 
        mx-2 
        rounded-lg 
        border
        p-2
        shadow-xl
        border-gray-300 
        bg-gray-100">
      <h2 class="text-center text-xl font-bold text-black dark:text-white">
        Último comentário foi de {{ user.name }}
      </h2>
      <p class="text-center">
        "{{ comentario.comentario }}" ao prof {{ comentario.nomeProfessor }} do {{ comentario.instProfessor }}
      </p>
    </div>
  </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
const professor = ref({});
const comentario = ref({});
const user = ref({});

console.log(comentario);

onMounted(() => {
  professor.value = usePage().props.professor || {};
  comentario.value = usePage().props.comentario || {};
  user.value = usePage().props.user || {};
});
</script>
