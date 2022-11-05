export const useStore = defineStore('main', {
  state: () => ({
    token: null as string,
    user: null as any,

    isAddModalShown: false
  }),

  actions: {
    getAuthFromLocal() {
      this.token = JSON.parse(localStorage.getItem('token'));
      this.user = JSON.parse(localStorage.getItem('user'));
    },

    setAuth(token, userData) {
      this.token = token;
      localStorage.setItem('token', JSON.stringify(token));

      this.user = userData;
      localStorage.setItem('user', JSON.stringify(userData));
    },

    clearAuth() {
      this.token = null;
      this.user = null;
    },

    isAuth() {
      return (this.token && this.user);
    },

    showAddModal() {
      this.isAddModalShown = true;
    },

    hideAddModal() {
      this.isAddModalShown = false;
    }
  }

});