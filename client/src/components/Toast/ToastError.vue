<script setup lang="ts">
defineProps<{
  message: string
}>();
</script>

<template>
  <div class="toast red white-text top active">
    <i>error</i>
    <span>{{ message }}</span>
  </div>
</template>