<template>
  <div class="min-h-screen bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-50 font-sans transition-colors duration-300">
    <AppHeader />
    <main class="w-full flex-grow flex flex-col">
      <slot />
    </main>
    <AppFooter />
  </div>
</template>

<script setup lang="ts">
// O layout padrão embute o Header e Footer e um container flexível que cresce
import AppHeader from '~/components/layout/AppHeader.vue'
import AppFooter from '~/components/layout/AppFooter.vue'
</script>
