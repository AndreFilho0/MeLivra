
<template>
    
    <AdminL>
      
              <section class="bg-white dark:bg-gray-900 p-10">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">veja todas as informações de um professor </h2>
      <form @submit.prevent="addComentario()" class="flex justify-center flex-col">
          <div class="grid gap-4  sm:gap-6">
          
            <div>
                <label for="instituto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instituto do professor </label>
                <select v-model="instituto" id="instituto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 ">
                    
                  <option v-for="inst in Inst" :value="inst">{{ inst }} <MagnifyingGlassIcon class="h-5 w-5 text-gray-400" aria-hidden="true" /></option>
                    <!-- Certifique-se de que 'Inst' seja um array contendo os institutos -->
                </select>  
            </div>
            <div>
                <label for="professor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do Professor</label>
                <select v-model="nomeProfessor" id="professor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option v-for="prof in ProfExp" :value="prof.nomeProfessor">{{ prof.nomeProfessor }}</option>
                    <!-- Substitua 'prof.id' pelo valor real que representa o identificador único do professor -->
                </select>
            </div>  
          </div>
          <div class="flex justify-center">
          <button type="submit" class="font-bold px-5 py-2.5 mt-4 sm:mt-6 text-sm  text-center text-black bg-blue-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
              BUSCAR
               
          </button>
          <div class="flex items-center">
              <MagnifyingGlassIcon class="h-8 w-8 mt-4 text-neutral-500" aria-hidden="true" />
          </div>
        </div>  
      </form>
      
     
  </div>
        </section>
          

        

   </AdminL>
</template>

<script setup>
import { MagnifyingGlassIcon } from '@heroicons/vue/20/solid'
import {ref , watch} from 'vue'
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import AdminL from './Profile/Componentes/AdminL.vue'
import { usePage,router,Link } from '@inertiajs/vue3';

// professores que estão no banco de dados
const Prof = usePage().props.profs;
let ComentariosProfs = usePage().props.comentario;
let NotaProfs = usePage().props.nota; 


//mensagem de add comentario sucesso


//instututos da ufg
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

let not = ref(false)

//form para comentario
const nomeProfessor = ref('')
const instituto = ref('')
const ProfExp = ref([]);
//end

//metodo para adicionar comentario
const addComentario = async()=>{
    

   try {
    await router.get(`/dashboard/procuraInfo?nomeProfessor=${nomeProfessor.value}&instituto=${instituto.value}`,{})
    
   } catch (error) {
    console.log(error);
    
   }
    
}
watch(instituto, (newValue, oldValue) => {
    
    ProfExp.value = Prof.filter(prof => prof.instituto == newValue);
    
});




onMounted(() => {
    initFlowbite();
})
</script>
