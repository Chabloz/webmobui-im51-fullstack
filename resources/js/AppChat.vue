<script setup>
import { onUnmounted, ref, watch, nextTick } from 'vue';

import { useFetchApi } from './composables/fetchApi.js';
import TheChatHeader from './components/TheChatHeader.vue';
import TheChatForm from './components/TheChatForm.vue';
import BaseChatMsg from './components/BaseChatMsg.vue';

const { data: messages, fetchData: getNewMessage } = useFetchApi('message');

const allMsg = ref([]);

const getMsgInterval = setInterval(getNewMessage, 1000);

watch(messages, async () => {
  if (messages.value?.length < 0) return;

  allMsg.value.push(...messages.value)
  await nextTick();
  window.scrollTo(0, document.body.scrollHeight);
});

onUnmounted(() => clearInterval(getMsgInterval));

</script>

<template>
  <q-layout view="hHh LpR fFf">

    <TheChatHeader elevated />

    <q-page-container>
      <q-list padding class="column">
        <BaseChatMsg v-for="msg in allMsg" :key="msg.id" :msg="msg" />
      </q-list>
    </q-page-container>

    <q-footer class="bg-grey-4 q-pa-xs">
      <TheChatForm />
    </q-footer>

  </q-layout>
</template>

<style scoped></style>