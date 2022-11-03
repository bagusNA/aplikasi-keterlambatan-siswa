<script setup lang="ts">
defineProps<{
  name: string
}>();
</script>

<template>
  <article class="border primary-container">
    <div class="row">
      <img class="circle large" src="/img/logo.png" alt="">
      <div class="max">
        <h5>Halo, {{ name }}!</h5>
        <p>Selamat datang di aplikasi Piket Pintar SMK Negeri 7 Samarinda.</p>
      </div>
    </div>
  </article>
</template>