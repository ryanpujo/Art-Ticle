<template>
  <div class="grid-container my-4 mx-auto w-fit md:w-auto lg:mx-4">

    <div v-for="(user, index) in page.data" :key="user.id" >
      <UserCard :is-followed="true" :user="user" class="mb-2 px-2 md:p-0" />
    </div>
  </div>
</template>

<script setup lang="ts">
import UserCard from '@/components/UserCard.vue';
import { User } from '@/types';
const prop = defineProps<{
  page: {
    data: User[];
    firstPageUrl: string;
    nextPageUrl: string;
  }
}>()

</script>