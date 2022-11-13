<script setup lang="ts">
import CardSummary from '@/components/Card/CardSummary.vue';
import CardWelcome from '@/components/Card/CardWelcome.vue';
import Modal from '@/components/Modal.vue';
import { useStore } from '@/stores/Store';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();
const store = useStore();

const isModalShown = ref(false);
</script>

<template>
  <main class="wrapper">
    <h4 class="wrapper__title">Dashboard</h4>
    <CardWelcome name="Rahmat" />

    <div class="cards-wrapper">
      <CardSummary title="Terlambat Hari Ini">
        <p>12 Orang</p>
      </CardSummary>
      <CardSummary title="Jam Piket">
        <p>07:00 - 10:00</p>
      </CardSummary>
    </div>

<!--    <button @click="isModalShown = !isModalShown"-->
<!--      class="extend square round"-->
<!--      id="btn-add"-->
<!--    >-->
<!--      <i>add</i>-->
<!--      <span>Absen</span>-->
<!--    </button>-->

    <button @click="() => router.push({ name: 'absent/add' })"
      class="extend square round" id="btn-add"
    >
      <i>add</i>
      <span>Absen</span>
    </button>

    <Modal :status="isModalShown">
      lsdfjk
    </Modal>
  </main>
</template>

<style scoped>
.cards-wrapper {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 12rem;
  margin-top: 12rem;
}

#btn-add {
  position: absolute;
  right: 5%;
  bottom: 4%;
}

@media only screen and (min-width: 600px) {
  .cards-wrapper {
    grid-template-columns: repeat(3, 1fr);
  }
}
</style>