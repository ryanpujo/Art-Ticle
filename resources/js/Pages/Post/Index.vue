<template>
  <div class="m-4">
    <div class="">
      <TextArea/>
    </div>
    <div class="posts-container">
      <PostList :user-posts="users" />
    </div>
    <div ref="bottom"></div>
  </div>
</template>

<script setup lang="ts">
import TextArea from "@/components/TextArea.vue";
import {Paginate, PostUser, User} from '@/types/';
import PostList from '@/components/PostList.vue';
import { usePage } from "@inertiajs/vue3";
import {useScrollPagination} from '@/composable/useScrollPagination'
import { ref, computed, onMounted } from "vue";
const props = defineProps<{
  page: Paginate
}>();
const bottom = ref<HTMLElement>();
let users = ref<PostUser[]>([])
const page = usePage();
const user = computed(() => {
  return page.props.user;
});

onMounted(() => {
  useScrollPagination(
    bottom,
    `/api/posts/${(user.value as User).id}`,
    (data) => {
      users.value.push(...data)
    }
  )
})

</script>