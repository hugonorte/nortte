<template>
  <header 
    class="sticky top-0 z-50 w-full transition-all duration-300 backdrop-blur-md bg-white/80 dark:bg-slate-900/80 border-b border-slate-200 dark:border-slate-800"
  >
    <div class="container mx-auto px-4 h-16 flex items-center justify-between">
      <!-- Logo / Name -->
      <NuxtLink to="/" @click="scrollToTop" class="text-[clamp(14px,4.5vw,20px)] whitespace-nowrap font-bold tracking-tight text-primary-600 dark:text-primary-400">
        &lt; HugoNorte /&gt; 
      </NuxtLink>

      <!-- Navigation Desktop -->
      <nav class="hidden md:flex items-center gap-6">
        <a v-for="link in navLinks" :key="link.to" :href="link.to" class="text-sm font-medium text-slate-600 hover:text-primary-600 dark:text-slate-300 dark:hover:text-primary-400 transition-colors">
          {{ $t(`nav.${link.key}`) }}
        </a>
      </nav>

      <!-- Right Actions -->
      <div class="flex items-center gap-2 sm:gap-4">
        <!-- Language Selector -->
        <select 
          v-model="currentLocale"
          @change="changeLocale"
          class="bg-transparent text-sm font-medium text-slate-600 dark:text-slate-300 outline-none cursor-pointer p-1 rounded hover:bg-slate-100 dark:hover:bg-slate-800 focus-visible:ring-2 focus-visible:ring-primary-500"
        >
          <option v-for="loc in availableLocales" :key="loc.code" :value="loc.code" class="text-slate-900 dark:text-white dark:bg-slate-900">
            {{ formatLocale(loc.code) }}
          </option>
        </select>

        <div class="flex items-center gap-2">
          <a href="https://github.com/hugonorte" target="_blank" rel="noopener" class="text-slate-600 hover:text-primary-600 dark:text-slate-300 dark:hover:text-primary-400 transition-colors p-1" aria-label="GitHub">
            <Icon name="lucide:github" class="w-5 h-5" />
          </a>
          <a href="https://linkedin.com/in/hugonorte" target="_blank" rel="noopener" class="text-slate-600 hover:text-primary-600 dark:text-slate-300 dark:hover:text-primary-400 transition-colors p-1" aria-label="LinkedIn">
            <Icon name="lucide:linkedin" class="w-5 h-5" />
          </a>
        </div>

        <ThemeToggle />

        <!-- Mobile Menu Toggle -->
        <button 
          @click="isMobileMenuOpen = true"
          class="md:hidden p-2 flex items-center justify-center rounded-full transition-colors hover:bg-slate-200 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-300"
          aria-label="Menu"
        >
          <Icon name="lucide:menu" class="w-5 h-5" />
        </button>
      </div>
    </div>

    <!-- Mobile Slideover Menu -->
    <Teleport to="body">
      <div v-if="isMobileMenuOpen" class="fixed inset-0 z-[100] md:hidden flex justify-end">
        <!-- Backdrop -->
        <div 
          class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm"
          @click="isMobileMenuOpen = false"
        ></div>

        <!-- Slideover panel -->
        <div class="relative z-10 w-64 h-full bg-white dark:bg-slate-900 shadow-2xl flex flex-col p-6 overflow-y-auto transform transition-transform duration-300">
          <div class="flex items-center justify-between mb-8">
            <span class="text-lg font-bold text-primary-600 dark:text-primary-400">Menu</span>
            <button 
              @click="isMobileMenuOpen = false"
              class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-300"
            >
              <Icon name="lucide:x" class="w-5 h-5" />
            </button>
          </div>

          <nav class="flex flex-col gap-4">
            <a 
              v-for="link in navLinks" 
              :key="link.to" 
              :href="link.to" 
              @click="isMobileMenuOpen = false"
              class="text-base font-medium text-slate-600 hover:text-primary-600 dark:text-slate-300 dark:hover:text-primary-400 transition-colors p-2 rounded-md hover:bg-slate-50 dark:hover:bg-slate-800/50"
            >
              {{ $t(`nav.${link.key}`) }}
            </a>
          </nav>
        </div>
      </div>
    </Teleport>
  </header>
</template>

<script setup lang="ts">
import ThemeToggle from '~/components/common/ThemeToggle.vue'
import { ref, computed } from 'vue'

const { locale, locales, setLocale } = useI18n()
const currentLocale = ref(locale.value)
const isMobileMenuOpen = ref(false)

const availableLocales = computed(() => locales.value as { code: string, name: string }[])

const formatLocale = (code?: string): string => {
  if (!code) return ''
  const parts = code.split('-')
  return (parts[0] || '').toUpperCase()
}

const changeLocale = () => {
  setLocale(currentLocale.value)
}

const scrollToTop = () => {
  if (import.meta.client) {
    window.scrollTo({ top: 0, behavior: 'smooth' })
  }
}

const navLinks = [
  { key: 'home', to: '#home' },
  { key: 'about', to: '#about' },
  { key: 'skills', to: '#skills' },
  { key: 'experience', to: '#experience' },
  { key: 'projects', to: '#projects' },
  { key: 'academic', to: '#academic' },
  { key: 'contact', to: '#contact' }
]
</script>
