<template>
    <div class="home">
      <header>
        <h1>Avistamentos de OVNIs no Brasil</h1>
      </header>
  
      <section class="welcome">
        <p>Bem-vindo(a) ao nosso site dedicado a registrar e compartilhar avistamentos de OVNIs em todo o Brasil. Se você já teve um encontro inexplicável ou testemunhou algo fora do comum nos céus, queremos ouvir sua história!</p>
        <button @click="relatarAvistamento">Relate seu avistamento</button>
      </section>
  
      <section class="relatos-recentes">
        <h2>Relatos recentes</h2>
        </section>
  
      <section class="mapa-avistamentos">
        <h2>Mapa de avistamentos</h2>
        </section>
  
      <section class="estatisticas">
        <h2>Estatísticas</h2>
        </section>
  
      <section class="recursos">
        <h2>Recursos</h2>
        </section>
  
      <footer>
        </footer>
    </div>
  </template>
  
  <script>
  export default {
    methods: {
      relatarAvistamento() {
        // Lógica para redirecionar para o formulário de relato
      }
    }
  }
  </script>
  
  <style scoped>
  /* Estilos para o componente Home */
  </style>