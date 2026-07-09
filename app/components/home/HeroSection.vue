<template>
  <section id="home" class="relative flex items-start pt-16 pb-20 mb-16 overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 bg-[url('~/assets/images/hello.avif')] bg-cover bg-center bg-no-repeat opacity-10 dark:opacity-20 pointer-events-none [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>
    
    <div class="container mx-auto px-4 flex flex-col items-center text-center relative z-10 animate-fade-up">
      <!-- Content -->
      <h1 class="text-4xl md:text-6xl font-bold tracking-tight text-slate-900 dark:text-white mb-4">
        Hugo Norte
      </h1>
      <h2 class="text-2xl md:text-3xl font-semibold text-primary-600 dark:text-primary-400 mb-6">
        {{ $t('hero.role') }}
      </h2>
      <p class="max-w-2xl text-lg md:text-xl text-slate-600 dark:text-slate-200 mb-10 leading-relaxed">
        {{ $t('hero.catchphrase') }}
      </p>



      <!-- Actions -->
      <div class="flex flex-col sm:flex-row items-center gap-4">
        <a 
          href="#contact" 
          class="px-8 py-3.5 text-base font-semibold text-white bg-primary-600 hover:bg-primary-700 dark:bg-primary-700 dark:hover:bg-primary-600 rounded-lg shadow-lg hover:shadow-primary-500/30 transition-all hover:-translate-y-0.5"
        >
          {{ $t('hero.contact') }}
        </a>
        <a 
          href="#projects" 
          class="px-8 py-3.5 text-base font-semibold text-slate-700 dark:text-slate-200 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg border border-slate-200 dark:border-slate-700 shadow-sm transition-all hover:-translate-y-0.5"
        >
          {{ $t('hero.viewProjects') }}
        </a>
      </div>

    </div>
  </section>
</template>

<script setup lang="ts">
// Hero Section
</script>
