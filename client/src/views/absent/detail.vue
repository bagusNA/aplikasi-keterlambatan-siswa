<script setup lang="ts">
definePageMeta({ key: route => route.fullPath });

const store = useStore();
const route = useRoute();

const endpoint = useAppConfig().endpoint;
const currentSchedule = await useAuthGet(`${endpoint}/api/v1/picket-schedules/current`);

console.log(currentSchedule.value);
const id = route.params.id;

const sendFormAction = () => {
  const url = endpoint + '/api/v1/absents';
  const data = useAuthPost(url, {
    student_id: store.selectedStudent.id,
    picket_schedule_id: currentSchedule.value.schedule.id
        
  });
}
</script>

<template>
  <form @submit.prevent="" method="post" class="form">
    <CardSummary :title="store.selectedStudent.name">
      <p>{{ store.selectedStudent.class.specialty.initial + ' ' + store.selectedStudent.class.number }}</p>
    </CardSummary>

  </form>
</template>

<style scoped>
.form {
  padding: 0 16rem;
}
</style>