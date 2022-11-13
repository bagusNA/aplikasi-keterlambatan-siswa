import { useAuthStore } from "../stores/AuthStore";

export const useAuthPost = async (url: string, body?: any) => {
  const store = useAuthStore();

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