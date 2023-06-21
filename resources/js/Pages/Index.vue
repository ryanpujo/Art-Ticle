<template>
  <p>
    hello
  </p>
  <form method="get">
  <Link :href="route('logout')" method="get" as="button">Sign out</Link>
  </form>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>