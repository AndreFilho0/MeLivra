<template > 
    <AdminL class="overflow-x-hidden">  
        
    
    
<div class="bg-white mt-20 flex justify-center md:-mr-60 p-6 ">
    <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-12 lg:gap-x-8 lg:py-32 lg:px-8">
      <div class="lg:col-span-4">
        <h2 class="text-2xl font-mono font-bold tracking-tight">Notas dadas para:</h2>
        <p class="text-center font-mono font-bold">{{ NotaProfs.nomeProfessor }}</p>
        <p class="text-center font-mono font-bold">{{ NotaProfs.instituto }}</p>

        <div class="mt-3 flex items-center">
          <div>
            
          </div>
          <p class="ml-2 text-sm font-mono font-bold">Baseado em  {{ NotaProfs.QtsAvalicao }} Notas</p>
        </div>
        

        <div class="mt-6">

          <dl class="space-y-3">
            <div v-for="count in reviews.counts" :key="count.rating" class="flex items-center text-sm">
              <dt class="flex flex-1 items-center">
                <p class="w-3 font-medium text-gray-900">{{ count.rating }}<span class="sr-only"> star reviews</span></p>
                <div aria-hidden="true" class="ml-1 flex flex-1 items-center">
                  <StarIcon class="text-yellow-300 flex-shrink-0 h-5 w-5" aria-hidden="true" />

                  <div class="relative w-full ml-3 flex-1">
                    <div class="h-3 rounded-full border border-gray-200 bg-gray-100" />
                    <div v-if="count.count > 0" class="absolute inset-y-0 rounded-full border border-yellow-300 bg-yellow-300" :style="{ width: `calc(${count.count} / ${reviews.totalCount} * 100%)` }" />
                  </div>
                </div>
              </dt>
              <dd class="ml-3 w-10 text-right text-sm tabular-nums font-mono font-bold">{{ Math.round((count.count / reviews.totalCount) * 100) }}%</dd>
              
            </div>
          </dl>
          <p class="font-mono font-bold text-center">Media = {{ (NotaProfs.Nota / NotaProfs.QtsAvalicao).toFixed(3)}}</p>
        </div>
        

        <div class="mt-10">
          <h3 class="text-lg  font-mono font-bold">Deixe alguma nota para esse Professor(a) </h3>
          <a :href="route('dashboard.darnota')" class="mt-6 font-mono inline-flex w-full items-center justify-center rounded-md border border-gray-300 bg-white py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-50 sm:w-auto lg:w-full">Adicionar uma nota</a>
        </div>
      </div>
      

      <div class="mt-16 lg:col-span-7 lg:col-start-6 lg:mt-0">

        <div class="flow-root">
          <div class="-my-12 divide-y divide-gray-200">
            <div v-for="review,index in UserComentarios"  :key="review.id" class="py-12">
              <div class="w-10 ml-2"><UserIcon></UserIcon></div>
              <div class="flex items-center">
                <div class="ml-4">
                  <h4 class="text-sm font-bold text-gray-900">{{ review.name }}</h4>
                  
                 
                </div>
              </div>

              <div class="mt-4 space-y-6 text-base italic text-gray-600" v-html="ComentariosProfs[index].comentario" />
            
            </div>
          </div>
        </div>

        <div class="mt-10">
          <h3 class="text-lg  font-mono font-bold">Deixe algum comentário para esse professor(a)</h3>
          <a :href="route('dashboard.deixarComentario')" class="mt-6 font-mono  inline-flex w-full items-center justify-center rounded-md border border-gray-300 bg-white py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-50 sm:w-auto lg:w-full">Adicionar um comentário</a>
        </div>
        
      </div>
      
    </div>

    
  </div>


  
  <section v-if="fileurls" class="py-8 flex justify-center items-center bg-white md:py-16 dark:bg-gray-900 antialiased ml-2">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
      <div class="flex justify-center" ><h2 class="font-mono font-bold">TURMAS ANTIGAS</h2></div>
      <div v-for="url in fileurls" class="m-10">
        <div  class="shrink-0 max-w-md lg:max-w-lg mx-auto">
          <img class="w-full  dark:block" :src="url" alt="" />
          

        </div>

        
      </div>
    </div>
  </section>

  

    
    
    
    
    </AdminL>


</template>

<script setup>
import {ref } from 'vue'
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import AdminL from './Profile/Componentes/AdminL.vue'
import { usePage,router,Link } from '@inertiajs/vue3';





//dados
let ComentariosProfs = usePage().props.comentarios;
let NotaProfs = usePage().props.notas;
let UserComentarios = usePage().props.user;
let nomeProfessor = usePage().props.nomeProfessor;
let instuto = usePage().props.instituto;
let fileurls = usePage().props.file_urls;








import { StarIcon , BookOpenIcon ,UserIcon } from '@heroicons/vue/20/solid'
const reviews = {
  average: 5,
  totalCount: NotaProfs.QtsAvalicao,
  counts: [
    { rating: 10, count: NotaProfs.QtsN10},
    { rating: 9, count: NotaProfs.QtsN9},
    { rating: 8, count: NotaProfs.QtsN8},
    { rating: 7, count: NotaProfs.QtsN7},
    { rating: 6, count: NotaProfs.QtsN6},
    { rating: 5, count: NotaProfs.QtsN5},
    { rating: 4, count: NotaProfs.QtsN4},
    { rating: 3, count: NotaProfs.QtsN3},
    { rating: 2, count: NotaProfs.QtsN2},
    { rating: 1, count: NotaProfs.QtsN1},
  ],
  featured: [
    {
      id: UserComentarios.id,
      rating: 6,
      content: ComentariosProfs.comentario,
      author: UserComentarios.name,
      avatarSrc:
        'https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80',
    },
    
    // More reviews...
  ],
} 


</script>