<script setup lang="ts">
import { RouterLink, useRouter } from 'vue-router';
import { useAuthStore } from '@/stores/AuthStore';
import { useStore } from '@/stores/Store';
import ToastSuccess from './Toast/ToastSuccess.vue';

const store = useStore();
const authStore = useAuthStore();
const router = useRouter();

const logoutAction = async () => {
  await authStore.logout();
  router.push({ name: 'login' });
};
</script>

<template>
  <nav class="m l left">
    <RouterLink to="/">
      <img class="circle" src="@/assets/img/logo.png" id="logo">
    </RouterLink>
    <RouterLink to="/">
      <i>home</i>
      <span>Home</span>
    </RouterLink>
    <RouterLink to="/absent">
      <i>history_edu</i>
      <span>Absen</span>
    </RouterLink>
    <RouterLink to="/">
      <i>event</i>
      <span>Jadwal</span>
    </RouterLink>
    <a @click="logoutAction">
      <i>logout</i>
      <span>Logout</span>
    </a>
  </nav>

  <nav class="s bottom">
    <RouterLink to="/">
      <i>home</i>
      <span>Home</span>
    </RouterLink>
    <RouterLink to="/absent">
      <i>history_edu</i>
      <span>Absen</span>
    </RouterLink>
    <RouterLink to="/">
      <i>event</i>
      <span>Jadwal</span>
    </RouterLink>
    <a @click="logoutAction">
      <i>logout</i>
      <span>Logout</span>
    </a>
  </nav>

  <ToastSuccess 
    v-show="store.success.status" 
    :message="store.success.message!" 
  />
</template>
