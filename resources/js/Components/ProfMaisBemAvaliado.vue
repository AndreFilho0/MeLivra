<!-- Componente para as tabelas professor melhor avaliado e Último Comentario -->
<template>
  <div class="flex flex-col md:flex-row justify-center w-full mt-3 gap-5">
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
      <h2 class="text-center text-xl font-bold text-black dark:text-white">Melhores professores :</h2>
      <p v-for="(prof, index) in professor" :key="index" class="text-center pl-3 flex justify-center gap-1">
        <StarIcon 
          :class="{
            'text-yellow-300': index === 0,
            'text-gray-300': index === 1,
            'text-orange-500': index === 2
          }"
          class="flex-shrink-0 h-5 w-5" 
          aria-hidden="false" 
        />
       {{ prof.nomeProfessor }} do {{ prof.instituto }} : <span class="text-green-500" >{{ (prof.Nota / prof.QtsAvalicao).toFixed(2) }}</span>
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
        Último comentário : 
      </h2>
      <p class="text-center font-mono" > Feito para {{ comentario.nomeProfessor }}</p>
      <p class="text-center font-mono" >Instituto: {{ comentario.instProfessor }}</p>
      <div class="mt-4 text-center space-y-6 text-base italic text-gray-600" v-html="comentario.comentario" />
      
    </div>
  </div>
</template>

<script setup>
import { StarIcon } from '@heroicons/vue/20/solid';
import { usePage } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
const professor = ref({});
const comentario = ref({});
const user = ref({});



onMounted(() => {
  professor.value = usePage().props.professor || {};
  comentario.value = usePage().props.comentario || {};
  user.value = usePage().props.user || {};
});
</script>
