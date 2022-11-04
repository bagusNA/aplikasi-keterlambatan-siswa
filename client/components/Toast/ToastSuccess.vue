<script setup lang="ts">
defineProps<{
  message: string
}>();
</script>

<template>
  <div class="toast green white-text top active">
    <i>done</i>
    <span>{{ message }}</span>
  </div>
</template>