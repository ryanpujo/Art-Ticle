<template>
  <div class="posts-container my-4 mx-auto w-fit lg:mx-4">

    <div v-for="(user, index) in users" :key="user.id" >
      <UserCard :user="user" class="mb-2 p-4 md:p-0" />
    </div>
  </div>
</template>

<script setup lang="ts">
import UserCard from '@/components/UserCard.vue';
import { User } from '@/types';



const prop = defineProps<{
  users: User[]
}>()
</script>