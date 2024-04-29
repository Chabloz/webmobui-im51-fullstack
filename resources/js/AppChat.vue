<script setup>
  import { useFetch } from './composables/fetch';

  const { data: users, error, fetchData } = useFetch('/api/chat/user/online');
  fetchData();

  const text = defineModel();
</script>

<template>
  <h1>Hello from Vue</h1>
  <q-input v-model="text" label="Standard" />
  <p>{{  text }}</p>
  <div>
    <h2>Online Users</h2>
    <ul>
      <li v-for="user in users">
        {{ user }}
      </li>
    </ul>
  </div>
</template>

<style scoped>

</style>