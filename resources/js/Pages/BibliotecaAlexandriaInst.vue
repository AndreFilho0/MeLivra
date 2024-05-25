<template>
    <AdminL />

    <div class="mt-12 flex py-8 px-4 mx-auto max-w-2xl lg:py-16 justify-center items-center">

      <header class=" text-black p-4 rounded-full flex">
        <img src="./Profile/Componentes/images/papiroH.png" alt="">
        <h1 class=" mt-4 mx-1 font-mono text-xl font-bold">Biblioteca de Alexandria</h1>
        <img src="./Profile/Componentes/images/papiroH.png" alt="">
      </header>

    </div>

<div class="flex justify-around items-center" >   
<div class="grid grid-cols-10 gap-1 ">
  <div v-for="(inst, index) in Inst" :key="index"
    class="w-13  flex flex-col items-center rounded-full transition-all duration-300 transform hover:w-17 hover:scale-110">
    <a >a</a>
  </div>
</div>
</div>

  

</template>

<script setup>
import AdminL from './Profile/Componentes/AdminL.vue'
import {ref , watch} from 'vue'
import { onMounted } from 'vue'
import { usePage,router,Link } from '@inertiajs/vue3';

const instituto = ref('')

const Inst =[
    "CEPAE",
    "EA",
    "EECA",
    "EMC",
    "EMAC",
    "EVZ",
    "FACE",
    "FIC",
    "FAFIL",
    "FANUT",
    "FAV",
    "FCS",
    "FD",
    "FE",
    "FEFD",
    "FEN",
    "FF",
    "FH",
    "FL",
    "FM",
    "FO",
    "ICB",
    "IESA",
    "IF",
    "IME",
    "INF",
    "IPTSP",
    "IQ",
    "FCT"
];

const enviarParaAPI = (inst) => {
      
      console.log("Elemento clicado:", inst);

      try {
         router.get('/dashboard/BibliotecaDeAlexandria/'+inst,{
        onSuccess: page => {
            

        },
    })
    
   } catch (error) {
    console.log(error);
    
   }

}






</script>


