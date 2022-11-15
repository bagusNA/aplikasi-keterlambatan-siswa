<script setup lang="ts">
import { useRouter } from 'vue-router';

const router = useRouter();

const props = defineProps<{
  title: string,
  backRoute?: string,
  onBeforeBack?: any,
  disableRedirect?: boolean,
  btnName?: string,
  btnAction?: any,
}>();

const action = () => {
  if (props.onBeforeBack)
    props.onBeforeBack();

  if (props.disableRedirect) return;

  props.backRoute ? router.push(props.backRoute) : router.back();
}
</script>

<template>
  <header>
      <nav>
        <button @click="action"
          class="circle transparent"
        >
          <i>arrow_backward</i>
        </button>
        <h5 class="max">{{ title }}</h5>
        <button v-if="btnName"
          @click="btnAction"
          class="circle transparent"
        >
          {{ btnName }}
        </button>
      </nav>
    </header>
</template>