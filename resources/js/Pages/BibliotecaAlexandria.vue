<template>
    <AdminL />
<div class="mt-12 flex py-8 px-4 mx-auto max-w-2xl lg:py-16 justify-center items-center">

  <header class="bg-blue-900 text-white p-4">
    <h1 class="text-3xl font-bold">Biblioteca de Alexandria</h1>
  </header>

  <div class="scroll-container">
    <div class="scroll"></div>
    <p class="text">Seu texto aqui</p>
  </div>


  <div class="fronton"></div>

  <div class="column-container">
    <div class="column"></div>
    <div class="column"></div>
    <div class="column"></div>
  </div>


  <div class="papyrus flex justify-center items-center">
    <div class="papyrus-content hover:w-56">
      <p>IME</p>
    </div>
  </div>


</div>  

</template>

<script setup>
import AdminL from './Profile/Componentes/AdminL.vue'


</script>

<style scoped>
.scroll-container {
  position: relative;
}
.papyrus {
  width: 300px;
  padding: 20px;
  background-color: #eedda5; /* Cor do papiro */
  border-radius: 15px;
  box-shadow: 2px 2px 4px rgba(233, 225, 156, 0.1); /* Sombra */
  position: relative;
  overflow: hidden;
}

.papyrus:before {
  content: '';
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 100%;
  height: 100%;
  background-color: #eedda5; /* Cor do papiro */
  z-index: -1;
  clip-path: polygon(0 0, 100% 0, 85% 100%, 15% 100%);
}

.papyrus-content {
  position: relative;
  z-index: 1;
}

.papyrus-content p {
  margin: 0;
  padding: 10px;
  font-size: 16px;
  font-family: 'Times New Roman', serif; /* Fonte que lembra escrita em papiro */
  line-height: 1.5;
}
.column-container {
  display: flex;
}

.column {
  width: 50px;
  height: 200px;
  background-color: #f3f4f6; /* Cor do corpo da coluna */
  border-radius: 8px;
  box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1); /* Sombra */
  margin: 0 10px;
}
.fronton {
  width: 0;
  height: 0;
  border-left: 50px solid transparent;
  border-right: 50px solid transparent;
  border-bottom: 50px solid #f3f4f6; /* Cor do frontão */
}

.scroll {
  width: 200px;
  height: 200px;
  background-color: #f3f4f6; /* Cor do pergaminho */
  border-radius: 15px;
  box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1); /* Sombra */
  overflow: hidden;
}

.text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 18px;
  color: #000;
  font-family: 'Times New Roman', serif; /* Fonte que lembra escrita em pergaminho */
}
</style>