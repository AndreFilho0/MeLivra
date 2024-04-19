<template > 
    <AdminL class="overflow-x-hidden">  
        
    
    
<div class="bg-white mt-20 flex justify-center md:-mr-60 p-6 ">
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
        
      </div>
      
    </div>

    
  </div>


  
  <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased ml-2">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
      <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
        <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
          
          <img class="w-full dark:hidden" src="./Profile/Componentes/images/turmas/ime/ABIEL COSTA MACEDO2022_2_v.png" alt="" />
          <img class="w-full hidden dark:block" src="./Profile/Componentes/images/turmas/ime/ABIEL COSTA MACEDO2022_2_v.png" alt="" />
        </div>

        <div class="mt-6 sm:mt-8 lg:mt-0">
          <h1
            class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"
          >
            Apple iMac 24" All-In-One Computer, Apple M1, 8GB RAM, 256GB SSD,
            Mac OS, Pink
          </h1>
          <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
            <p
              class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white"
            >
              $1,249.99
            </p>

            <div class="flex items-center gap-2 mt-2 sm:mt-0">
              <div class="flex items-center gap-1">
                <svg
                  class="w-4 h-4 text-yellow-300"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                  />
                </svg>
                <svg
                  class="w-4 h-4 text-yellow-300"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                  />
                </svg>
                <svg
                  class="w-4 h-4 text-yellow-300"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                  />
                </svg>
                <svg
                  class="w-4 h-4 text-yellow-300"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                  />
                </svg>
                <svg
                  class="w-4 h-4 text-yellow-300"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                  />
                </svg>
              </div>
              <p
                class="text-sm font-medium leading-none text-gray-500 dark:text-gray-400"
              >
                (5.0)
              </p>
              <a
                href="#"
                class="text-sm font-medium leading-none text-gray-900 underline hover:no-underline dark:text-white"
              >
                345 Reviews
              </a>
            </div>
          </div>

          <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
            <a
              href="#"
              title=""
              class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
              role="button"
            >
              <svg
                class="w-5 h-5 -ms-2 me-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"
                />
              </svg>
              Add to favorites
            </a>

            <a
              href="#"
              title=""
              class="text-white mt-4 sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center"
              role="button"
            >
              <svg
                class="w-5 h-5 -ms-2 me-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"
                />
              </svg>

              Add to cart
            </a>
          </div>

          <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

          <p class="mb-6 text-gray-500 dark:text-gray-400">
            Studio quality three mic array for crystal clear calls and voice
            recordings. Six-speaker sound system for a remarkably robust and
            high-quality audio experience. Up to 256GB of ultrafast SSD storage.
          </p>

          <p class="text-gray-500 dark:text-gray-400">
            Two Thunderbolt USB 4 ports and up to two USB 3 ports. Ultrafast
            Wi-Fi 6 and Bluetooth 5.0 wireless. Color matched Magic Mouse with
            Magic Keyboard or Magic Keyboard with Touch ID.
          </p>
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
console.log(instuto)
console.log(nomeProfessor);


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