import type { Student } from "@/types/model";
import { defineStore } from "pinia";

interface MessageBag {
  status: boolean,
  message: string | null
}

export const useStore = defineStore('main', {
  state: () => ({
    error: {
      status: false,
      message: ''
    } as MessageBag,
    success: {
      status: false,
      message: ''
    } as MessageBag,
    selectedStudent: null as (Student | null),
  }),

  actions: {
    setError(message: string, duration?: number) {
      this.error.status = true;
      this.error.message = message;


      if (duration)
        setTimeout(this.clearError, duration);
    },

    clearError() {
      this.error.status = false;
      this.error.message = null;
    },

    setSuccess(message: string, duration?: number) {
      this.success.status = true;
      this.success.message = message;

      if (duration)
        setTimeout(this.clearSuccess, duration);
    },

    clearSuccess() {
      this.success.status = false;
      this.success.message = null;
    },
  }
});