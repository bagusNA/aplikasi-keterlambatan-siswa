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
  margin-bottom: 80rem;
  min-height: calc(100vh - 80rem);
}

@media only screen and (min-width: 600px) {
  .wrapper {
    margin-left: 80rem;
  }
}
</style>