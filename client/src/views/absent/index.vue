<template>
  <div class="wrapper">
    <h4 class="wrapper__title">Absen</h4>
    <div class="wrapper__cards">
      <CardSummary title="Terlambat Terbaru">
        <div class="late-card__content">
          <div>
            <p><b>Budi Setiawan</b></p>
            <p>XII RPL 4</p>
          </div>
          <h4>07:23</h4>
        </div>
      </CardSummary>
    </div>
  </div>
</template>

<style scoped>
.wrapper__cards {
  display: grid;
  grid-template-columns: repeat(1, 1fr);
}

.late-card__content {
  display: grid;
  grid-template-columns: 1fr 1fr;
  align-items: stretch;
}

.late-card__content > *:nth-child(2) {
  justify-content: end;
}

@media only screen and (min-width: 600px) {
  .wrapper__cards {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media only screen and (min-width: 768px) {
  .wrapper__cards {
    grid-template-columns: repeat(3, 1fr);
  }
}
</style>