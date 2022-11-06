export default defineNuxtRouteMiddleware((to) => {
    const isAuth = useAuthStore().isAuth;

    if (!isAuth && to.name !== 'login')
        return navigateTo({ name: 'login' });
    else if (isAuth && to.name === 'login')
        return navigateTo({ name: 'index' });
});