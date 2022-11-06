<script setup lang="ts">
const router = useRouter();

const isLoading = ref(false);
const students = ref(null);
const form = reactive({
  studentName: '',
});

const searchAction = async () => {
  isLoading.value = true;

  const url = useAppConfig().endpoint + '/api/v1/students?q=' + form.studentName;
  const data = await useAuthGet(url);

  students.value = data.students;
  isLoading.value = false;
}
</script>

<template>
  <div class="wrapper">
    <header>
      <nav>
          <button @click="() => router.push('/')"
            class="circle transparent"
          >
            <i>arrow_backward</i>
          </button>
        <h5 class="max">Tambah Murid Terlambat</h5>
      </nav>
    </header>
    <form @submit.prevent="searchAction"
      class="field label suffix round border large">
      <input v-model="form.studentName" type="text">
      <label>Nama Murid</label>
      <i v-if="!isLoading" @click="searchAction">search</i>
      <a v-else class="loader"></a>
    </form>
    <div v-if="students">
      <div v-for="student in students" class="row">
        <img class="circle tiny" src="/img/logo.png" :alt="student.name">
        <div class="max">
          <h6>{{ student.name }}</h6>
          <p>{{ student.class.specialty.initial + ' ' + student.class.number }}</p>
        </div>
        <button class="none">Button</button>
        <button class="none">
          <i>more_vert</i>
        </button>
      </div>
    </div>
  </div>
</template>

<script>

</script>