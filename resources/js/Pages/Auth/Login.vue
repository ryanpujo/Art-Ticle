<template>
  <div class="md:flex md:flex-row-reverse bg-white">
    <div class="md:w-1/2 mb-6 bg-cover h-96 md:h-screen bg-no-repeat bg-login-image">
    </div>
    <div class="flex justify-center items-center md:w-1/2">
      <form @submit.prevent="login" class="p-6 rounded-xl border-2 shadow-2xl">
        <div class="container-form-field">
          <UserIcon class="input-icon"/>
          <input type="text" id="email" v-model="form.email" class="input-field" placeholder="Email">
        </div>
        <div v-if="!form.errors.email" class="mb-4"></div>
        <div v-if="form.errors.email" class="error-message">{{ form.errors.email }}</div>
        <div class="container-form-field">
          <PuzzlePieceIcon class="input-icon"/>
          <input type="password" id="password" placeholder="password" v-model="form.password" class="input-field">
        </div>
        <div v-if="!form.errors.password" class="mb-4"></div>
        <div v-if="form.errors.password" class="error-message">{{ form.errors.password }}</div>
        <div class="flex justify-between">
          <div class="items-center">
            <input type="checkbox" name="remember me" v-model="form.rememberme" value="ok" class="mr-2 mb-2">
            <label for="remember me" class="text-sm">Remember me</label>
          </div>
          <Link class="text-sm text-blue-600" :href="route('useraccount.create')">Register now</Link>
        </div>
        <button type="submit" class="btn-primary">Sign in</button>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts">
import { useForm, Link } from "@inertiajs/vue3";
import {UserIcon} from "@heroicons/vue/24/outline";
import {PuzzlePieceIcon} from "@heroicons/vue/24/outline";

const form = useForm({
  email: null,
  password: null,
  rememberme: false,
})


const login = () => form.post(route("auth.login"));
</script>

<script lang="ts">
import NoLayout from "@/Layouts/NoLayout.vue"
export default {
  layout: NoLayout
}
</script>