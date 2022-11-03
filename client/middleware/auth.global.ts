export default defineNuxtRouteMiddleware((to, from) => {
    const store = useStore();

    if (!store.token && to.name !== 'login')
        return navigateTo({ name: 'login' });
    else if (store.token && to.name === 'login')
        return navigateTo({ name: 'home' });
});