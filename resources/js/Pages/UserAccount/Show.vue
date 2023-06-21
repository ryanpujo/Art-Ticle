<template>
  <PostList :user-posts="posts" />
</template>


<script setup lang="ts">
import PostList from '@/components/PostList.vue';
import { Post, PostUser, User } from '@/types';
import { computed } from 'vue';

const props = defineProps<{
  user: User;
  posts: Post[];
}>();


const posts = computed(() => {
  let posts: PostUser[] = [];
  props.posts.map(post => {
    posts?.push({
    user: props.user,
    post: post
  });
  })
  return posts;
})

props.posts.map((post) => {
  
})
</script>