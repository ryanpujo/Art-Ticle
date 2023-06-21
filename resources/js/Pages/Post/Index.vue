<template>
  <div class="m-4">
    <div class="">
      <TextArea/>
    </div>
    <div class="posts-container">
      <PostList :user-posts="userPosts" />
  </div>
  </div>
</template>

<script setup lang="ts">
import TextArea from "@/components/TextArea.vue";
import {PostUser} from '@/types/';
import PostList from '@/components/PostList.vue';

const props = defineProps<{
  userPosts: PostUser[]
}>();
</script>