<script setup>
  import { ref } from 'vue';
  import { csrfToken } from '../bootstrap.js';

  const name = defineModel('name');
  const password = defineModel('password');
  const isPwd = ref(true);

  function submit(evt) {
    evt.target.submit();
  }

  function reset() {
    name.value = '';
    password.value = '';
    isPwd.value = true;
  }
</script>

<template>
  <q-form
    action="/login"
    method="post"
    @submit="submit"
    @reset="reset"
    autocomplete="off"
  >
    <input type="hidden" name="_token" :value="csrfToken">

    <q-input
      filled
      v-model="name"
      name="name"
      label="Username"
      hint="Your username"
      lazy-rules="ondemand"
      :rules="[ val => val && val.match(/^[a-z]+$/i) && val.length > 1 || 'Alphabetic only, at least 2']"
    />

    <q-input
      v-model="password"
      name="password"
      filled
      :type="isPwd ? 'password' : 'text'"
      hint="Your password"
      lazy-rules="ondemand"
      :rules="[ val => val && val.length > 1 || 'Password required']"
    >
      <template v-slot:append>
        <q-icon
          :name="isPwd ? 'visibility_off' : 'visibility'"
          class="cursor-pointer"
          @click="isPwd = !isPwd"
        />
      </template>
    </q-input>

    <div>
      <q-btn label="Submit" type="submit" color="primary"/>
      <q-btn label="Reset" type="reset" color="primary" flat class="q-ml-sm" />
    </div>
  </q-form>
</template>

<style scoped>

</style>