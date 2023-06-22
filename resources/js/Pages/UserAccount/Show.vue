<template>
  <PostList :user-posts="page.data" />
</template>


<script setup lang="ts">
import PostList from '@/components/PostList.vue';
import { Paginate, Post, PostUser, User } from '@/types';
import { computed } from 'vue';

const props = defineProps<{
  page: Paginate,
}>();
</script>