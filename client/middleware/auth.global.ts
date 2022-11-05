export default defineNuxtRouteMiddleware( async (to, from) => {
    const store = useStore();

    const isAuth = store.isAuth();

    console.log(await store.isAuth())

    if (!isAuth && to.name !== 'login')
        return navigateTo({ name: 'login' });
    else if (isAuth && to.name === 'login')
        return navigateTo({ name: 'home' });
});