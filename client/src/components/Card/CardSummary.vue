<script setup lang="ts">
defineProps<{
  title: string,
}>();
</script>

<template>
  <div class="round-small border card">
    <h5>{{ title }}</h5>
    <div class="card__desc">
      <slot />
    </div>
  </div>
</template>

<style scoped>
.card {
  padding: 16rem;
}

.card__desc {
  font-size: 16rem;
}
</style>