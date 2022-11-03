export const useStore = defineStore('main', {
  state: () => ({
    token: null as string,
  }),

  actions: {
    setToken(token: string) {
      this.token = token;
    },

    clearToken() {
      this.token = null;
    }
  }

});