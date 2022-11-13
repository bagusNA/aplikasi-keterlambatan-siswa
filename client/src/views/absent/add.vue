<script setup lang="ts">
import { useAuthGet } from '@/composables/useAuthGet';
import { useStore } from '@/stores/Store';
import { inject, reactive, ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();
const store = useStore();

const isLoading = ref(false);
// const selectedStudent = ref(null);
const students = ref(null);
const form = reactive({
  studentName: '',
});

const searchAction = async () => {
  isLoading.value = true;

  const url = inject('endpoint') + '/api/v1/students?q=' + form.studentName;
  const data = await useAuthGet(url);

  students.value = data.students;

  isLoading.value = false;
}

const selectStudentAction = (student) => {
  store.selectedStudent = student;

  router.push('/absent-add/' + store.selectedStudent.id);
}
</script>

<template>
    <div class="wrapper">
      <Topbar title="Tambah Murid Terlambat" />

      <div v-if="!store.selectedStudent">
        <form @submit.prevent="searchAction"
          class="field label suffix round border large">
          <input v-model="form.studentName" type="text">
          <label>Nama Murid</label>
          <i v-if="!isLoading" @click="searchAction">search</i>
          <a v-else class="loader"></a>
        </form>
        <div v-if="students">
          <div v-for="student in students" 
            @click="() => selectStudentAction(student)"
            class="row pointer" 
          >
            <img class="circle tiny" src="/img/logo.png" :alt="student.name">
            <div class="max">
              <h6>{{ student.name }}</h6>
              <p>{{ student.class.specialty.initial + ' ' + student.class.number }}</p>
            </div>
          </div>
        </div>
      </div>

      <NuxtPage />
    </div>
</template>

<script>

</script>