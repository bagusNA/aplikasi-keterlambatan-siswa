// https://v3.nuxtjs.org/api/configuration/nuxt.config
export default defineNuxtConfig({
  modules: [
    [
      '@pinia/nuxt', 
      {
        autoImports: ['defineStore']
      }
    ],
  ],
  alias: {
    pinia: '/node_modules/@pinia/nuxt/node_modules/pinia/dist/pinia.mjs',
  },
  imports: {
    dirs: ['stores']
  },
  app: {
    head: {
      link: [
        { href: 'https://fonts.googleapis.com', rel: 'preload'},
        { href: 'https://fonts.gstatic.com', rel: 'preload', crossorigin: ''},
        { href: 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap', rel: 'stylesheet'},
      ]
    },
    pageTransition: { name: 'page', mode: 'out-in' }
  },
  ssr: false
});
