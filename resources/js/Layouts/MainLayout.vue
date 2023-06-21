<template>
  <div class="bg-blue-600">
    <nav class=" border-gray-200 dark:bg-gray-900 md:mx-4">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 md:p-0 md:py-4">
        <img src="../../../public/images/color_with_background.jpg" class="h-8" />

        <Search v-if="width >= 768"/>


        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-6 h-6 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
          <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-blue-700 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-inherit dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <Search v-if="width < 768"/>
            <li>
              <Link :href="route('post.index')" class="block py-2 pl-3 pr-4 text-white hover:bg-blue-400 rounded md:bg-transparent md:text-white-700 md:p-0 dark:text-white md:dark:text-white-500" aria-current="page">Home</Link>
            </li>
            <li>
              <Link :href="route('useraccount.show', (user as User).id)" class="block py-2 pl-3 pr-4 rounded hover:bg-blue-400 md:border-0 md:p-0 text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Profile</Link>
            </li>
            <li>
              <Link :href="route('useraccount.following', (user as User).id)" class="block py-2 pl-3 pr-4 rounded hover:bg-blue-400 md:border-0 md:p-0 text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Following</Link>
            </li>
           
            <li>
              <Link :href="route('logout')" class="block py-2 pl-3 pr-4 rounded hover:bg-blue-400 md:border-0 md:p-0 text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Sign out</Link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <div class="max-w-7xl md:mx-auto mx-2">
    <slot></slot>
  </div>
</template>


<script setup lang="ts">
import { usePage, Link } from '@inertiajs/vue3';
import { initFlowbite } from 'flowbite';
import { computed, onMounted } from 'vue';
import Search from "@/components/Search.vue";
import { User } from '@/types';
import { useWindowSize} from '@vueuse/core'
const page = usePage();
onMounted(() => {
  initFlowbite();
});
declare function route(name:string, params?: any);

const {width} = useWindowSize();

const user = computed(() => {
  return page.props.user;
});
</script>

