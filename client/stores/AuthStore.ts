import { useStore } from "./Store";

interface AuthStore {
  token: string,
  user: any
}

export const useAuthStore = defineStore('auth', {
  state: (): AuthStore => ({
    token: JSON.parse(localStorage.getItem('token')) ?? null,
    user: JSON.parse(localStorage.getItem('user')) ?? null,
  }),

  getters: {
    isAuth(): boolean {
      return !!(this.token && this.user);
    },
  },

  actions: {
    getAuthFromLocal() {
      this.token = JSON.parse(localStorage.getItem('token'));
      this.user = JSON.parse(localStorage.getItem('user'));
    },

    async login(username, password) {
      const endpoint = useAppConfig().endpoint;
      const store = useStore();

      const res = await fetch(`${endpoint}/api/v1/auth/login`, {
        method: 'POST',
        body: JSON.stringify({
          username: username,
          password: password
        }),
        headers: {
          'Content-Type': 'application/json'
        }
      });
    
      const data = await res.json();
    
      if (!data.token) {
        store.setError(data.message);
        return false;
      }

      this.token = data.token;
      this.user = data.user;

      localStorage.setItem('token', JSON.stringify(this.token));
      localStorage.setItem('user', JSON.stringify(this.user));

      return true;
    },

    async logout() {
      const endpoint = useAppConfig().endpoint;
      const store = useStore();

      const data = await useAuthPost(`${endpoint}/api/v1/auth/logout`);

      store.setSuccess(data.message, 1000);

      this.token = null;
      this.user = null;
      
      localStorage.removeItem('token');
      localStorage.removeItem('user');

      return true;
    },
  }

});