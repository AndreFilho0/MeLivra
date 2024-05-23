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
             {{ messagem }}
           </p>
         </div>
       </div>
     </div>
   </div>
   
     </template>
     
     <script setup>
     import { ExclamationTriangleIcon } from '@heroicons/vue/20/solid'
     import AdminL from './AdminL.vue'
     import { usePage,router,Link } from '@inertiajs/vue3';
   
     let messagem = usePage().props.messagem;
   
     </script>