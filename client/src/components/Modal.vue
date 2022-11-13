<script setup lang="ts">
defineProps<{
  status: boolean
}>()
</script>

<template>
  <div :class="{ 'active': status }"
    class="modal top">
    <slot />
  </div>
</template>