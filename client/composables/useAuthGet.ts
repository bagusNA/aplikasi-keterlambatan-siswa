import { useStore } from "../stores/Store";

export const useAuthGet = async (url: string) => {
  const store = useStore();

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