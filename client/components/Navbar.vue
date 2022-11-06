<script setup lang="ts">
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
    <NuxtLink to="/">
      <img class="circle" src="/img/logo.png" id="logo">
    </NuxtLink>
    <NuxtLink to="/">
      <i>home</i>
      <span>Home</span>
    </NuxtLink>
    <NuxtLink to="/absent">
      <i>history_edu</i>
      <span>Absen</span>
    </NuxtLink>
    <NuxtLink to="/">
      <i>event</i>
      <span>Jadwal</span>
    </NuxtLink>
    <NuxtLink @click="logoutAction">
      <i>logout</i>
      <span>Logout</span>
    </NuxtLink>
  </nav>

  <nav class="s bottom">
    <NuxtLink to="/">
      <i>home</i>
      <span>Home</span>
    </NuxtLink>
    <NuxtLink to="/absent">
      <i>history_edu</i>
      <span>Absen</span>
    </NuxtLink>
    <NuxtLink to="/">
      <i>event</i>
      <span>Jadwal</span>
    </NuxtLink>
    <NuxtLink @click="logoutAction">
      <i>logout</i>
      <span>Logout</span>
    </NuxtLink>
  </nav>

  <ToastSuccess 
    v-show="store.success.status" 
    :message="store.success.message" 
  />
</template>
