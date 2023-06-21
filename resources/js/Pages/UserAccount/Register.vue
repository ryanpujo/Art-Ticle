<template>
  <div class="flex justify-center items-center h-screen bg-register-image">
    <div class="form-container bg-white">
      <h1 class="mx-auto w-fit text-xl mb-2">Create Account</h1>
      <form @submit.prevent="register" class="">
        <div class="container-form-field">
          <UserIcon class="input-icon"/>
          <input type="text" class="input-field" v-model="form.name" name="name" placeholder="Name" />
        </div>
        <div v-if="form.errors.name" class="error-message">{{ form.errors.name }}</div>
        <div class="container-form-field">
          <UserCircleIcon class="input-icon"/>
          <input type="text" class="input-field" name="email" v-model="form.email" placeholder="email" />
        </div>
        <div v-if="form.errors.email" class="error-message">{{ form.errors.email }}</div>
        <div class="container-form-field">
          <EllipsisHorizontalIcon class="input-icon"/>
          <input type="password" class="input-field" name="password" v-model="form.password" placeholder="password" />
        </div>
        <div v-if="form.errors.password" class="error-message">{{ form.errors.password }}</div>
        <Link class="text-xs text-blue-600" :href="route('login')">Login to an Account</Link>
        <button type="submit" class="btn-primary mt-2">Send</button>
      </form>
    </div>
  </div>
</template>


<script setup lang="ts">
import {UserIcon, UserCircleIcon, EllipsisHorizontalIcon} from "@heroicons/vue/24/outline"
import { Link, useForm } from "@inertiajs/vue3";


const form = useForm({
  name: null,
  email: null,
  password: null
})

const register = () => form.post(route("useraccount.store"));

</script>

<script lang="ts">
import NoLayout from "@/Layouts/NoLayout.vue"
export default {
  layout: NoLayout
}
</script>