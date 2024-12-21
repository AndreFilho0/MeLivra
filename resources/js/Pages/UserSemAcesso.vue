<template>
 <AdminL />
<div class="flex h-screen justify-center items-center">
  <div class="border-l-4 border-yellow-400 bg-yellow-50 p-4">
    <div class="flex">
      <div class="flex-shrink-0">
        <ExclamationTriangleIcon class="h-5 w-5 text-red-800" aria-hidden="true" />
      </div>
      <div class="ml-3">
        <p class="text-sm text-yellow-700">
          Você já fez 10 requisições nas últimas 24 horas,
          <a :href="route('subscribe')" class="font-medium text-yellow-700 underline hover:text-yellow-600">assine o plano Me Livra+ ou espere {{ 24 - difHoras }} horas até liberar acesso</a>
        </p>
      </div>
    </div>
  </div>
</div>

  </template>
  
  <script setup>
  import { ExclamationTriangleIcon } from '@heroicons/vue/20/solid'
  import AdminL from './Profile/Componentes/AdminL.vue'
  import { usePage,router,Link } from '@inertiajs/vue3';

  let difHoras = usePage().props.difHoras;

  </script>