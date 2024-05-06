<script setup>
  import { ref } from 'vue';
  import { useFetchApi } from '../composables/fetchApi.js';

  const { fetchData: postMessage } = useFetchApi('message');

  const message = defineModel('message');
  const inputMsg = ref(null);

  function submit() {
    postMessage({ message: message.value });
    message.value = '';
    inputMsg.value.focus();
  }
</script>

<template>
  <q-form @submit="submit" class="row justify-start">
    <q-input ref="inputMsg" filled dense v-model="message" label="Message" class="col-11">
      <template v-slot:after>
      </template>
    </q-input>
    <q-btn type="submit" color="primary" flat icon="send" class="col-1"/>
  </q-form>
</template>

<style scoped>

</style>