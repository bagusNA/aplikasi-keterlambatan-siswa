<script setup lang="ts">
const store = useStore();
const router = useRouter();

const url = `${useAppConfig().endpoint}/api/v1/auth/logout`;
const message = ref('');

const logoutAction = () => {
  const data = useAuthPost(url);

  message.value = (data as any).message;

  store.clearToken();
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

  <ToastSuccess :message="message" v-show="message" />
</template>
