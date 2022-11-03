<template>
  <div>
    <Sidebar id="side-bar" />
    <slot />
    <BottomBar id="bottom-bar" />
  </div>
</template>

<style>
.wrapper {
  /* display: flow-root; */
  overflow: auto;
  padding: 16rem;
  margin-bottom: 80rem;
  min-height: calc(100vh - 80rem);
}

@media only screen and (min-width: 600px) {
  .wrapper {
    margin-left: 80rem;
    margin-bottom: 0;
    min-height: 100vh;
  }
}
</style>