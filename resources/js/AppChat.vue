<script setup>
import { useFetchApi } from './composables/fetchApi.js';
import TheChatHeader from './components/TheChatHeader.vue';
import TheChatForm from './components/TheChatForm.vue';

// const { data: users, error, fetchData } = useFetchApi('user/online');
// fetchData();

</script>

<template>
  <q-layout view="hHh LpR fFf">

    <TheChatHeader elevated />

    <q-page-container>
      <q-list padding class="column">
        <q-item dense class="row">
          <q-item-section avatar top>
            Very Long Username
          </q-item-section>
          <q-item-section top>
            Message here
          </q-item-section>
        </q-item>

        <q-item dense class="row">
          <q-item-section avatar top>
            user1
          </q-item-section>
          <q-item-section top>
            Message here
          </q-item-section>
        </q-item>
      </q-list>
    </q-page-container>

    <q-footer class="bg-grey-4 q-pa-xs">
      <TheChatForm />
    </q-footer>

  </q-layout>
</template>

<style scoped></style>