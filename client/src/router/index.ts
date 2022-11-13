import { useAuthStore } from '@/stores/AuthStore';
import { createRouter, createWebHistory } from 'vue-router';
import Index from '../views/index.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Index
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('@/views/login.vue')
    },
    {
      path: '/absent',
      name: 'absent',
      component: () => import('@/views/absent/index.vue')
    },
    {
      path: '/absent/add',
      name: 'absent/add',
      component: () => import('@/views/absent/add.vue')
    },
    {
      path: '/absent/{id}',
      name: 'absent/detail',
      component: () => import('@/views/absent/detail.vue')
    },
  ]
});

// router.beforeEach((to) => {
//   const isAuth = useAuthStore().isAuth;

//   if (!isAuth && to.name !== 'login')
//       return { name: 'login' };
//   else if (isAuth && to.name === 'login')
//       return { name: 'index' };
// });

export default router;
