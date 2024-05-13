<script setup>
  import { onUnmounted, watch } from 'vue';
  import { useFetchApi } from '../composables/fetchApi.js';
  console.log('here');

  const { data: users, fetchData: getOnlineUsers } = useFetchApi('user');
  const getUsersInterval = setInterval(getOnlineUsers, 5000);
  watch(users, () => {
    console.log(users.value);
  });
  onUnmounted(() => clearInterval(getUsersInterval));
</script>

<template>
  <q-list>
    <q-item v-for="user in users" :key="user.id">
      <q-item-section>
        <q-item-label>
          {{ user.name }}
        </q-item-label>
      </q-item-section>
    </q-item>
  </q-list>
</template>

<style scoped>

</style>