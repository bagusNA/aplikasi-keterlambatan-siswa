import { useStore } from "../stores/Store";

export const useAuthPost = async (url: string, body?: any) => {
  const store = useStore();

  const res = await fetch(url, {
    method: 'POST',
    body: JSON.stringify(body),
    headers: {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${store.token}`
    }
  });

  const data = await res.json();

  return data;
}