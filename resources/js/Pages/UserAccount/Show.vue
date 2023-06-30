<template>
  <PostList :user-posts="posts" />
  <div ref="bottom"></div>
</template>


<script setup lang="ts">
import PostList from '@/components/PostList.vue';
import { useScrollPagination, useAuthenticateUser } from '@/composable';
import { PostUser } from '@/types';
import {  onMounted, ref } from 'vue';
const posts = ref<PostUser[]>([]);
const bottom = ref<HTMLElement>();
const user = useAuthenticateUser();
onMounted(() => {
  useScrollPagination<PostUser>(bottom, 
    `/api/users/posts/${user.value.id}`,
    (data) => {
      posts.value.push(...data);
    }
  );
})
</script>