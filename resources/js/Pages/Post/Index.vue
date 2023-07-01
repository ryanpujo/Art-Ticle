<template>
  <div class="m-4">
    <div class="">
      <TextArea/>
    </div>
    <div class="grid-container">
      <PostList :user-posts="users" />
    </div>
    <div ref="bottom"></div>
  </div>
</template>

<script setup lang="ts">
import TextArea from "@/components/TextArea.vue";
import {PostUser, User} from '@/types/';
import PostList from '@/components/PostList.vue';
import {useScrollPagination, useAuthenticateUser} from '@/composable'
import { ref, onMounted } from "vue";
const bottom = ref<HTMLElement>();
let users = ref<PostUser[]>([])
const user = useAuthenticateUser();
onMounted(() => {
  useScrollPagination<PostUser>(
    bottom,
    `/api/posts/${(user.value as User).id}`,
    (data) => {
      users.value.push(...data)
    }
  )
})
</script>