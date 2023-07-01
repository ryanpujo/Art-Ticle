<template>
  <div 
    :style="{'--image-url': `url(${profile.profile_picture})`}" 
    class="md:bg-[image:var(--image-url)] rounded-xl md:p-4 md:mt-4 md:bg-cover md:bg-no-repeat">
    <UserCard :is-followed="followings.filter(e => e.id == profile.id).length > 0" :user="profile" class="mx-auto mt-4" />
  </div>
  <div class="grid-container">
    <PostList :user-posts="posts" />
  </div>
  <div ref="bottom"></div>
</template>


<script setup lang="ts">
import PostList from '@/components/PostList.vue';
import { useScrollPagination, useAuthenticateUser } from '@/composable';
import { PostUser, User } from '@/types';
import {  onMounted, ref } from 'vue';
import UserCard from '@/components/UserCard.vue';
const posts = ref<PostUser[]>([]);
const bottom = ref<HTMLElement>();
const props = defineProps<{
  profile: User
  followings: User[]
}>();
const userAuth = useAuthenticateUser();
onMounted(() => {
  useScrollPagination<PostUser>(bottom, 
    `/api/users/posts/${props.profile.id}`,
    (data) => {
      posts.value.push(...data);
    }
  );
})
</script>