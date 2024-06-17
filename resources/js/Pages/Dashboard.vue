<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import AdminL from './Profile/Componentes/AdminL.vue'
import Github from './Profile/Componentes/Github.vue';


onMounted(() => {
    initFlowbite();
})
</script>

<template>
    <Head title="Me Livra Dashboard" />

    
    <AdminL>
    
   </AdminL>
   
   <Github >
    
   </Github>
</template>
