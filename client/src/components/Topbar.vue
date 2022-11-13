<script setup lang="ts">
const router = useRouter();

const props = defineProps<{
  title: string,
  backRoute?: string,
  onBeforeBack?: any
}>();

const action = () => {
  if (props.onBeforeBack)
    props.onBeforeBack();

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
      </nav>
    </header>
</template>