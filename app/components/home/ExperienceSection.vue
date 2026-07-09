<template>
  <section id="experience" class="py-20 bg-slate-50 dark:bg-slate-900/50">
    <div class="container mx-auto px-4">
      <h2 class="text-4xl font-bold text-center text-slate-900 dark:text-white mb-16">
        {{ $t('experience.title') }}
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div 
          v-for="(job, index) in experiences" 
          :key="index"
          class="p-6 md:p-8 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all group"
        >
          <div class="w-12 h-12 rounded-lg bg-slate-100 dark:bg-slate-700 flex items-center justify-center mb-6 group-hover:bg-primary-50 dark:group-hover:bg-primary-900/30 transition-colors">
            <Icon :name="job.icon" class="w-6 h-6 text-slate-500 dark:text-slate-400 group-hover:text-primary-600 dark:group-hover:text-primary-400" />
          </div>
          
          <div class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-2">
            {{ job.period }}
          </div>
          
          <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-1">
            {{ job.role }}
          </h3>
          
          <div class="text-primary-600 dark:text-primary-400 font-medium mb-4">
            {{ job.company }}
          </div>
          
          <ul class="space-y-2 text-sm text-slate-600 dark:text-slate-300">
            <li v-for="(desc, idx) in job.description" :key="idx" class="flex gap-2">
              <span class="text-primary-500 mt-0.5">•</span>
              <span>{{ desc }}</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
const experiences = [
  {
    company: 'PSTG Tech',
    role: 'Desenvolvedor Full Stack',
    period: '2024 - 2026',
    icon: 'lucide:building-2',
    description: [
      'Liderança técnica em projetos de frontend usando Nuxt e Nextjs.',
      'Scrum Master em projeto C# com Vue3',
      'Liderança em projeto Laravel com AWS'
    ]
  },
  {
    company: 'MedicAid',
    role: 'Desenvolvedor Full Stack',
    period: '2025 - 2026',
    icon: 'lucide:rocket',
    description: [
      'Desenvolvimento Frontend Angular',
      'Desenvolvimento Backend NodeJs'
    ]
  },
  {
    company: 'Medportal',
    role: 'Desenvolvedor Full Stack',
    period: '2018 - 2024',
    icon: 'lucide:code-2',
    description: [
      'Liderança técnica em projetos de frontend usando HTML, CSS e Javascript',
      'Desenvolvimento backend PHP'
    ]
  }
]
</script>
