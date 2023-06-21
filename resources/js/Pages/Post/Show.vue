<template>
  <div>
    <h1>{{ title }}</h1>
    <article>
      {{ content }}
    </article>
  </div>
</template>

<script setup lang="ts">
import { Post } from '@/types';


const props = defineProps<Post>();
</script>