<script setup lang="ts">
defineProps<{
  status: boolean
}>()
</script>

<template>
  <div :class="{ 'active': status }"
    class="modal top">
    <h5>Top Modal</h5>
    <div>Some text here</div>
    <nav class="right-align">
      <button class="border">Cancel</button>
      <button>Confirm</button>
    </nav>
    <slot />
  </div>
</template>