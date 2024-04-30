<script setup>
  import { ref } from 'vue';

  const name = defineModel('name');
  const password = defineModel('password');
  const isPwd = ref(true);

  function submit(evt) {
    evt.target.submit();
  }

  function reset(evt) {
    name.value = '';
    password.value = '';
    isPwd.value = true;
  }
</script>

<template>
  <div class="column items-center">

    <h1 class="row text-h2">IM Chat</h1>

    <div class="row full-width justify-center">
      <q-form
        action="/login"
        method="post"
        @submit="submit"
        @reset="reset"
        autocomplete="off"
        class="q-gutter-md col-md-3 col-sm-5 col-xs-12"
      >
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
          filled
          :type="isPwd ? 'password' : 'text'"
          hint="Your password"
          lazy-rules="ondemand"
          :rules="[ val => val && val.length > 7 || 'Password required']"
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
    </div>
  </div>
</template>

<style scoped>

</style>