<template>

    <AdminL>

        <section class="bg-white dark:bg-gray-900 p-10">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add Comentário , preencha o instituto primeiro</h2>
      <form @submit.prevent="addComentario()" class="flex justify-center flex-col">
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div>
                <label for="instituto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instituto do professor</label>
                <select v-model="instituto" id="instituto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option v-for="inst in Inst" :value="inst">{{ inst }}</option>
                    
                </select>  
            </div>
              
            <div>
                <label for="professor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Professores</label>
                <select v-model="nomeProfessor" id="professor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option v-for="prof in ProfExp" :value="prof.nomeProfessor">{{ prof.nomeProfessor }}</option>
                   
                </select>
            </div>
              
              <div class="sm:col-span-2">
                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">comentário</label>
                  <textarea v-model="comentario" id="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="seu comentário aqui"></textarea>
              </div>
          </div>
          <button type="submit" class="font-bold px-5 py-2.5 mt-4 sm:mt-6 text-sm  text-center text-black bg-blue-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
              Add comentário
          </button>
      </form>
      
      <Link v-if="not" :href="route('dashboard.buscarprofessor')" type="button" class="relative  mt-10 block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
    <span class="mt-2 block text-sm font-medium text-gray-900"><div v-html="mensagemAgradecimento" class="p-4 m-4"></div></span>
      </Link>
  </div>
        </section>
         
   
        
    </AdminL>
    
</template>
<script setup>
import {ref, watch} from 'vue'
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import AdminL from './Profile/Componentes/AdminL.vue'
import { usePage,router,Link } from '@inertiajs/vue3';

// professores que estão no banco de dados
const Prof = usePage().props.profs;

//mensagem de add comentario sucesso
let mensagemAgradecimento = ref('')



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
const comentario = ref('')
const ProfExp = ref([]);
//end


//metodo para adicionar comentario
const addComentario = async()=>{
    const formData = new FormData();
    formData.append('nomeProfessor',nomeProfessor.value);
    formData.append('instituto',instituto.value);
    formData.append('comentario',comentario.value);

   try {
    await router.post('/dashboard/addComentario',formData,{
        onSuccess: page => {
            not.value = true
            mensagemAgradecimento.value = '<div class="bg-green-400 text-center border-2 p-10 text-slate-900 from-neutral-950"><p>Obrigado por ajudar a comunidade!</p></div>';

        },
    })
    
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