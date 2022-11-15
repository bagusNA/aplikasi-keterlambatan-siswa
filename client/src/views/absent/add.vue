<script setup lang="ts">
import StudentCard from '@/components/Card/StudentCard.vue';
import Topbar from '@/components/Topbar.vue';
import { useAuthGet } from '@/composables/useAuthGet';
import { useAuthPost } from '@/composables/useAuthPost';
import { useStore } from '@/stores/Store';
import type { Student } from '@/types/model';
import { inject, reactive, ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();
const store = useStore();
const endpoint = inject('endpoint') as string;

const isLoading = ref(false);
const students = ref<Student[]>([]);
const search = reactive({
  studentName: '',
});
const form = reactive({
  student_id: 0,
  description: '',
  time_arrived: ''
});

const searchAction = async () => {
  isLoading.value = true;

  const url = endpoint + '/api/v1/students?q=' + search.studentName;
  const data = await useAuthGet(url);

  students.value = data.students;

  isLoading.value = false;
}

const selectStudentAction = (student: Student) => {
  store.selectedStudent = student;

  // router.push('/absent-add/' + store.selectedStudent.id);
}

const addAbsenteeAction = async () => {
  form.student_id = store.selectedStudent!.id;

  const date = new Date();
  form.time_arrived = `${date.getHours}:${date.getMinutes}`;
  
  const url = `${endpoint}/api/v1/absents`
  const data = await useAuthPost(url, form);

  console.log(data);
}

const backAction = () => {
  if (store.selectedStudent)
    store.selectedStudent = null;
}
</script>

<template>
    <div class="wrapper">
      <Topbar 
        title="Tambah Murid Terlambat" 
        :onBeforeBack="backAction" 
        :disableRedirect="!!(store.selectedStudent)"
        btnName="Simpan"
        :btnAction="addAbsenteeAction"
      />

      <div v-if="!store.selectedStudent">
        <form @submit.prevent="searchAction"
          class="field label suffix round border large">
          <input v-model="search.studentName" type="text">
          <label>Nama Murid</label>
          <i v-if="!isLoading" @click="searchAction">search</i>
          <a v-else class="loader"></a>
        </form>
        <div v-if="students">
          <div v-for="student in students" 
            @click="() => selectStudentAction(student)"
            class="row pointer" 
          >
            <img class="circle tiny" src="@/assets/img/logo.png" :alt="student.name">
            <div class="max">
              <h6>{{ student.name }}</h6>
              <p>{{ student.class.specialty.initial + ' ' + student.class.number }}</p>
            </div>
          </div>
        </div>
      </div>

      <div v-else>
        <div class="absent-grid">
          <StudentCard :student="store.selectedStudent" />
        </div>

        <div class="field textarea label border">
          <textarea v-model="form.description"></textarea>
          <label>Keterangan</label>
        </div>
      </div>
    </div>
</template>

<style scoped>
.absent-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
}
</style>