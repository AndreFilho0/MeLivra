<script setup>
import { ref } from 'vue'
import { Head, Link } from '@inertiajs/vue3';
import Github from './Profile/Componentes/Github.vue'
import { CheckIcon, HandThumbUpIcon, UserIcon } from '@heroicons/vue/20/solid'

const timeline = [
  {
    id: 1,
    content: 'Informações',
    target: 'das estatísticas de várias turmas dos professores:',
    href: '#',
    imageUrl: "images/estProf.jpeg",
    icon: CheckIcon,
    iconBackground: 'bg-green-500',
  },
  {
    id: 2,
    content: 'Nova visualizações',
    target: 'de notas para cada professor:',
    href: '#',
    imageUrl: "images/notas.jpeg",
    icon: CheckIcon,
    iconBackground: 'bg-green-500',
  },
]

const version = ref('3.00.0');

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Bem vindo" />
    <meta name="google-adsense-account" content="ca-pub-1380981380586696">

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Dashboard</Link
            >

            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Entrar</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Criar Conta</Link
                >
            </template>
        </div>

        <Github>

        </Github>



<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 border-y-indigo-200  antialiased">
  <div class="flex justify-between alipx-4 mx-auto max-w-screen-xl ">
      <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
          <header class="mb-4 lg:mb-6 not-format">
              <address class="flex items-center mb-6 not-italic">
                  <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                      <img class="mr-4 w-15 h-15 rounded-full" src="images/icone.png" alt="Jese Leos">
                      <div>
                          <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">Me Livra</a>
                          <p class="text-base text-gray-500 dark:text-gray-400">{{ version }}</p>
                      </div>
                      
                  </div>
              </address>
              <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">Bem vindo à nossa comunidade da UFG , feita para ajudar os alunos e compartilhar experiências</h1>
          </header>
          <p class="lead"></p>
          <p class="font-mono font-bold">Novidades da versão 3 do Me Livra: </p>
                   
            <div class="flow-root mt-4">
                <ul role="list" class="-mb-8">
                <li v-for="(event, eventIdx) in timeline" :key="event.id">
                    <div class="relative pb-8">
                    <span v-if="eventIdx !== timeline.length - 1" class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true" />
                    <div class="relative flex space-x-3">
                        <div>
                        <span :class="[event.iconBackground, 'h-8 w-8 rounded-full flex items-center justify-center ring-8 ring-white']">
                            <component :is="event.icon" class="h-5 w-5 text-white" aria-hidden="true" />
                        </span>
                        </div>
                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                        <div>
                            <p class="text-sm text-gray-500">
                            {{ event.content }} <a class="font-medium text-gray-900">{{ event.target }}</a>
                            </p>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="m-4 rounded"><img class="rounded" :src="event.imageUrl" alt=""></div>
                </li>
                </ul>
            </div>
         
          
         
          
          
          
          
      </article>
  </div>
</main>


    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
