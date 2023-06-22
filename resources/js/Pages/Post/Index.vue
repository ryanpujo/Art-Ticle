<template>
  <div class="m-4">
    <div class="">
      <TextArea/>
    </div>
    <Pagination class="my-2" :links="page.links"/>
    <div class="posts-container">
      <PostList :user-posts="page.data" />
    </div>
   <Pagination class="my-2" :links="page.links"/>
  </div>
</template>

<script setup lang="ts">
import TextArea from "@/components/TextArea.vue";
import {Paginate, PostUser} from '@/types/';
import PostList from '@/components/PostList.vue';
import Pagination from '@/components/Pagination.vue';
const props = defineProps<{
  page: Paginate
}>();
</script>