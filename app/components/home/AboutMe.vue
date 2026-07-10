<template>
  <section id="about" class="py-20 bg-white dark:bg-slate-900/50">
    <div class="container mx-auto px-4 max-w-5xl">
      <div class="flex flex-col md:flex-row gap-12 items-center">
        <!-- Photo Column (1/4 width) -->
        <div class="w-full md:w-1/4 flex justify-center">
          <div class="relative w-48 aspect-[4/5] md:w-full md:aspect-[4/5] max-w-[220px]">
            <div class="absolute inset-0 rounded-[5%] bg-primary-500 blur-xl opacity-30 dark:opacity-40 animate-pulse"></div>
            <img 
              src="https://github.com/hugonorte.png" 
              alt="Hugo Norte" 
              class="relative w-full h-full object-cover rounded-[5%] border-4 border-white dark:border-slate-800 shadow-xl"
            />
          </div>
        </div>
        
        <!-- Content Column (3/4 width) -->
        <div class="w-full md:w-3/4">
          <h2 class="text-4xl font-bold text-slate-900 dark:text-white mb-6">
            {{ $t('about.title') }}
          </h2>
          <div class="space-y-4 text-lg text-slate-600 dark:text-slate-300 leading-relaxed text-justify sm:text-left">
            <p>{{ $t('about.p1') }}</p>
            <p>{{ $t('about.p2') }}</p>
            <p>{{ $t('about.p3') }}</p>
            <p>{{ $t('about.p4') }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
// About Me Section
</script>
