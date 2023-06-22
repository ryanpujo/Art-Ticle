<template>
  <nav class="mx-auto w-fit">
  <ul v-for="(link, index) in links" :key="index" class="inline-flex items-center -space-x-px">
    <li>
      
      <Link 
        v-if="link.url" 
        v-html="link.label" 
        :href="link.url" 
        :class="{'bg-white': !link.active, 'bg-purple-400': link.active}"
        class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-purple-400 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"></Link>
    </li>
  </ul>
</nav>
</template>

<script setup lang="ts">
import { LinkPage } from '@/types';
import { Link } from '@inertiajs/vue3';
import {} from '@heroicons/vue/24/solid'

const props = defineProps<{
  links: LinkPage[]
}>();

</script>