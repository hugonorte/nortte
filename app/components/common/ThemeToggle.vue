<template>
  <button 
    @click="toggleTheme" 
    class="p-2 flex items-center justify-center rounded-full transition-colors hover:bg-slate-200 dark:hover:bg-slate-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-500"
    aria-label="Alternar tema"
  >
    <ClientOnly>
      <Icon 
        :name="colorMode.preference === 'dark' ? 'lucide:sun' : 'lucide:moon'" 
        class="w-5 h-5 text-slate-600 dark:text-slate-300"
      />
      <template #fallback>
        <div class="w-5 h-5"></div>
      </template>
    </ClientOnly>
  </button>
</template>

<script setup lang="ts">
const colorMode = useColorMode()

const toggleTheme = () => {
  colorMode.preference = colorMode.preference === 'dark' ? 'light' : 'dark'
}
</script>
