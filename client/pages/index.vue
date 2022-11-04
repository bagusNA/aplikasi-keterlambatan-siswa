<template>
  <main class="wrapper">
    <CardWelcome name="Rahmat"/>
    <div class="cards-wrapper">
      <CardSummary title="Terlambat Hari Ini">
        <p>12 Orang</p>
      </CardSummary>
      <CardSummary title="Jam Piket">
        <p>07:00 - 10:00</p>
      </CardSummary>
    </div>
  </main>
</template>

<style scoped>
.cards-wrapper {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 12rem;
  margin-top: 12rem;
}

@media only screen and (min-width: 600px) {
  .cards-wrapper {
    grid-template-columns: repeat(3, 1fr);
  }
}
</style>