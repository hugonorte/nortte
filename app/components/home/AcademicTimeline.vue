<template>
  <section id="academic" class="py-20 bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800">
    <div class="container mx-auto px-4 max-w-4xl">
      <h2 class="text-4xl font-bold text-center text-slate-900 dark:text-white mb-16">
        {{ $t('academic.title') }}
      </h2>

      <div class="relative ml-3 md:ml-0 md:pl-0">
        <!-- Vertical Line -->
        <div class="absolute left-0 md:left-1/2 top-0 bottom-0 w-0.5 bg-slate-200 dark:bg-slate-700 md:-ml-px"></div>

        <div 
          v-for="(item, index) in academics" 
          :key="index"
          class="mb-10 ml-8 md:ml-0 md:flex md:justify-between md:items-center w-full"
          :class="{'md:flex-row-reverse': index % 2 !== 0}"
        >
          <!-- Timeline Dot -->
          <div class="absolute w-4 h-4 bg-primary-500 rounded-full -left-[7px] md:left-1/2 md:-ml-[8px] border-4 border-white dark:border-slate-900"></div>
          
          <!-- Content Box -->
          <div class="md:w-[45%]">
            <div class="p-6 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-sm hover:border-primary-300 dark:hover:border-primary-700 transition-colors">
              <span class="inline-block px-3 py-1 bg-primary-50 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400 text-xs font-semibold rounded-full mb-3">
                {{ item.period }}
              </span>
              <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-1">
                {{ item.course }}
              </h3>
              <div class="text-slate-600 dark:text-slate-400 font-medium">
                {{ item.institution }}
              </div>
            </div>
          </div>
          
          <div class="hidden md:block md:w-[45%]"></div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
const academics = [
  {
    institution: 'UniverCidade',
    course: 'Bacharelado em Marketing',
    period: '2002 - 2006'
  },
  {
    institution: 'UFRJ',
    course: 'MBA em Gestão Empresarial',
    period: '2013 - 2014'
  },
  {
    institution: 'Unifeso',
    course: 'Bacharelado em Ciência da Computação',
    period: '2023 - 2026'
  }
]
</script>
