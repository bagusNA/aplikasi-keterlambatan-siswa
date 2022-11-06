<script setup lang="ts">
const store = useStore();
const authStore = useAuthStore();
const router = useRouter();

const isLoading = ref(false);

const form = reactive({
  username: null as string,
  password: null as string,
});

const loginAction = async () => {
  isLoading.value = true;
  const login = await authStore.login(form.username, form.password);  
  isLoading.value = false;

  if (!login) return;
  router.push({ name: 'index' });
}
</script>

<template>
  <div class="wrapper">
    <article id="login" class="no-padding border small-elevate">
      <!-- <img class="responsive small" src="/img/logo.png" > -->
      <div class="responsive small" id="login__hero">
        <div id="login__hero__content">
          <h4>Piket Pintar</h4>
          <Loading v-show="isLoading" />
        </div>
      </div>

      <div class="padding">
        <!-- <h4 class="login__title">Login</h4> -->

        <form @submit.prevent="loginAction" method="post">
          <div class="field label border round">
            <input type="text" v-model="form.username">
            <label>Username</label>
          </div>

          <div class="field label border round">
            <input type="password" v-model="form.password">
            <label>Password</label>
          </div>

          <button class="responsive small-elevate large round">
            <i>login</i>
            <span>Login</span>
          </button>
        </form> 
      </div>
    </article>

    <ToastError 
      :message="store.error.message ?? ''" 
      v-show="store.error.status" 
      @click="store.clearError"
    />
  </div>
</template>

<style scoped>
.wrapper {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  font-family: 'Montserrat', 'Roboto', sans-serif;
  min-height: 100vh;
  margin: 0;
  background-color: var(--primary-container);
  background-image: url("/svg/blob.svg");
  background-size: cover;
  background-position: center;
}

#login {
  background-color: var(--primary-container);
}

.login__title {
  margin-bottom: 22rem;
  justify-content: center;
}

#login__hero {
  background-image: url('/img/hero-1.jpg');
  background-size: cover;
}

#login__hero__content {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  backdrop-filter: brightness(.25) blur(2px);
  height: 100%;
  width: 100%;
  color: var(--surface);
  padding: 24rem 0;
}

@media only screen and (min-width: 768px) {
  .wrapper {
    background-image: url("/svg/blob2.svg");
  }
}
</style>