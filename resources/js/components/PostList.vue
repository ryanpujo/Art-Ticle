<template>


    <div 
      v-for="(post, index) in userPosts" :key="post.postId" 
      class="my-4 p-2 bg-white rounded-lg"
    >
      <div class="flex justify-between mb-2">
        <div class="flex">
          <Link :href="route('useraccount.show', post.userId)" class="self-center">
            <img v-if="post.profilePic && post.profilePic.length != 0" :alt="post.name.charAt(0)" :src="post.profilePic" class="h-6 w-6 self-center rounded-full mr-2" />
            <UserCircleIcon v-else class="h-6 mr-2"/>
          </Link>
          <h4 class="self-center">{{ post.name }}</h4>
        </div>
        <div>{{ (new Date(post.createdAt)).toLocaleString() }}</div>
      </div>
      <div class="flex justify-between">
        <h1 class="text-lg line-clamp-1">{{ post.title }} {{ post.name }}</h1>
        <EllipsisVerticalIcon class="h-6"/>
      </div>
      <hr class="h-px my-2 bg-gray-200 border-0">
      <p class="line-clamp-5">{{post.content}}</p>
      <Link class="text-blue-500" :href="route('post.show', post.userId)">Read more...</Link>
    </div>
</template>


<script setup lang="ts">
import { PostUser, User } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { UserCircleIcon, EllipsisVerticalIcon } from '@heroicons/vue/24/solid';
import { computed, onMounted, ref } from 'vue';
import { useIntersectionObserver } from '@vueuse/core';
import axios from 'axios';
const props = defineProps<{
  userPosts: PostUser[]
}>()

</script>