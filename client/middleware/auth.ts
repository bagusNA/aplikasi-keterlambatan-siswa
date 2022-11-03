const store = useStore();

export default defineNuxtRouteMiddleware((to, from) => {
  // if (!store.token && to.name !== 'login')
  //   return { name: 'login' }
  // else if (store.token && to.name === 'login')
  //   return { name: 'home' }
});