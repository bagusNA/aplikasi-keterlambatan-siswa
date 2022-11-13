<script setup lang="ts">
import { RouterView, useRoute } from 'vue-router';
import Navbar from '@/components/Navbar.vue';
import { Transition } from 'vue';

const route = useRoute();
</script>

<template>
  <Navbar v-if="route.name !== 'login'" />

  <RouterView v-slot="{ Component }">
    <Transition name="fade">
      <component :is="Component" />
    </Transition>
  </RouterView>
</template>

<style>
.wrapper {
  /* display: flow-root; */
  overflow: auto;
  padding: 16rem;
  margin-bottom: 80rem;
  min-height: calc(100vh - 80rem);
}

.wrapper__title {
  padding: 10rem 0;
}

.round-small {
  border-radius: 12rem;
}

.pointer {
  cursor: pointer;
}

@media only screen and (min-width: 600px) {
  .wrapper {
    margin-left: 80rem;
    margin-bottom: 0;
    min-height: 100vh;
  }
}

.fade-enter-active,
.fade-leave-active {
  transition: all 0.2s;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
  filter: blur(3rem);
}
</style>
