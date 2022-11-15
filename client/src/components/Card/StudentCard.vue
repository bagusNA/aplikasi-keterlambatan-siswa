<script setup lang="ts">
import type { Student } from '@/types/model';

defineProps<{
  student: Student
}>();
</script>

<template>
  <article class="no-padding">
    <div class="grid no-space">
      <div class="s6">
        <img class="responsive" src="@/assets/img/logo.png" height="100">
      </div>
      <div class="s6">
        <div class="padding">
          <h5>{{ student.name }}</h5>
          <p>{{ student.class.specialty.initial + ' ' + student.class.number }}</p>
        </div>
      </div>
    </div>
  </article>
</template>