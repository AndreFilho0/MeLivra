<template>
    <AdminL>  
        
    
    
<div class="bg-white mt-20 flex justify-center">
    <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-12 lg:gap-x-8 lg:py-32 lg:px-8">
      <div class="lg:col-span-4">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Notas dadas para:</h2>
        <p class="text-center">{{ NotaProfs.nomeProfessor }}</p>
        <p class="text-center">{{ NotaProfs.instituto }}</p>

        <div class="mt-3 flex items-center">
          <div>
            
          </div>
          <p class="ml-2 text-sm text-gray-900">Baseado em  {{ NotaProfs.QtsAvalicao }} Notas</p>
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
              <dd class="ml-3 w-10 text-right text-sm tabular-nums text-gray-900">{{ Math.round((count.count / reviews.totalCount) * 100) }}%</dd>
              
            </div>
          </dl>
          <p class="font-bold text-center">Media = {{ NotaProfs.Nota/NotaProfs.QtsAvalicao }}</p>
        </div>

        <div class="mt-10">
          <h3 class="text-lg font-medium text-gray-900">Deixe alguma nota para esse Professor </h3>
          <a :href="route('dashboard.darnota')" class="mt-6 inline-flex w-full items-center justify-center rounded-md border border-gray-300 bg-white py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-50 sm:w-auto lg:w-full">Adicioanr uma nota</a>
        </div>
      </div>

      <div class="mt-16 lg:col-span-7 lg:col-start-6 lg:mt-0">
        <h3 class="sr-only">Recent reviews</h3>

        <div class="flow-root">
          <div class="-my-12 divide-y divide-gray-200">
            <div v-for="review in reviews.featured" :key="review.id" class="py-12">
              <div class="flex items-center">
                <img :src="review.avatarSrc" :alt="`${review.author}.`" class="h-12 w-12 rounded-full" />
                <div class="ml-4">
                  <h4 class="text-sm font-bold text-gray-900">{{ review.author }}</h4>
                  <div class="mt-1 flex items-center">
                    <StarIcon v-for="rating in [0, 1, 2, 3, 4,5]" :key="rating" :class="[review.rating > rating ? 'text-yellow-400' : 'text-gray-300', 'h-5 w-5 flex-shrink-0']" aria-hidden="true" />
                  </div>
                  <p class="sr-only">{{ review.rating }} out of 5 stars</p>
                </div>
              </div>

              <div class="mt-4 space-y-6 text-base italic text-gray-600" v-html="review.content" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
    
    
    
    </AdminL>


</template>

<script setup>
import {ref} from 'vue'
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import AdminL from './Profile/Componentes/AdminL.vue'
import { usePage,router,Link } from '@inertiajs/vue3';


//dados
let ComentariosProfs = usePage().props.comentarios;
let NotaProfs = usePage().props.notas;


import { StarIcon , BookOpenIcon } from '@heroicons/vue/20/solid'
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
      id: 1,
      rating: 6,
      content: "oi",
      author: 'Emily Selman',
      avatarSrc:
        'https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80',
    },
    // More reviews...
  ],
} 


</script>