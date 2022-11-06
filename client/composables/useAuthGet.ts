import { useAuthStore } from "../stores/AuthStore";

export const useAuthGet = async (url: string) => {
  const store = useAuthStore();

  const res = await fetch(url, {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${store.token}`
    }
  });

  const data = await res.json();

  return data;
}