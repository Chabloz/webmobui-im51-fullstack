<script setup>
  const props = defineProps({
    msg: Object
  });
</script>

<template>
  <q-item dense>
    <q-item-section avatar top>
      {{ msg.user.name }} :
    </q-item-section>
    <q-item-section top>
      {{ msg.msg }}
    </q-item-section>
  </q-item>
</template>

<style scoped>

</style>