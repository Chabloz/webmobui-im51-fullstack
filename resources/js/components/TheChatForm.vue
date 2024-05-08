<script setup>
  import { ref } from 'vue';
  import { useFetchApi } from '../composables/fetchApi.js';

  const { fetchData: postMessage } = useFetchApi('message');

  const msg = defineModel('msg');
  const inputMsg = ref(null);

  function submit() {
    if (!msg.value) return
    postMessage({ msg: msg.value });
    msg.value = '';
    inputMsg.value.focus();
  }
</script>

<template>
  <q-form @submit="submit" class="row justify-start">
    <q-input
      ref="inputMsg"
      filled
      dense
      v-model.trim="msg"
      label="Message"
      class="col-11"
    />
    <q-btn type="submit" color="primary" flat icon="send" class="col-1" />
  </q-form>
</template>

<style scoped>

</style>