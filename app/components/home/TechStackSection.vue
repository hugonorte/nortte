<template>
  <section id="skills" class="py-20 bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800">
    <div class="container mx-auto px-4">
      <h2 class="text-4xl font-bold text-center text-slate-900 dark:text-white mb-16">
        {{ $t('tech.title') }}
      </h2>

      <UTabs default-value="ai" :items="items" class="w-full" :ui="{ indicator: 'bg-primary-700 dark:bg-primary-700', trigger: 'data-[state=active]:text-white dark:data-[state=active]:text-white' }">
        <template #content="{ item }">
          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 mt-8">
            <div 
              v-for="(tech, index) in technologies[item.value as keyof typeof technologies]" 
              :key="index"
              class="flex items-center gap-4 p-4 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 hover:border-primary-500 dark:hover:border-primary-500 transition-colors shadow-sm hover:shadow-md group"
            >
              <Icon :name="tech.icon" class="w-5 h-5 flex-shrink-0 transition-all duration-300" />
              
              <div class="flex items-center justify-between flex-1 gap-2 min-w-0">
                <span class="text-sm font-bold text-slate-900 dark:text-white leading-tight truncate">
                  {{ tech.name }}
                </span>
                <span class="text-xs font-medium text-slate-500 dark:text-slate-400 whitespace-nowrap flex-shrink-0">
                  {{ tech.level }}/10
                </span>
              </div>
            </div>

            <div v-if="!technologies[item.value as keyof typeof technologies]?.length" class="col-span-full py-12 text-center text-slate-500 dark:text-slate-400 border border-dashed border-slate-200 dark:border-slate-700 rounded-2xl">
              Nenhuma tecnologia cadastrada para {{ item.label }} no momento.
            </div>
          </div>
        </template>
      </UTabs>
    </div>
  </section>
</template>

<script setup lang="ts">
const items = [
  { value: 'ai', label: 'Inteligência Artificial' },
  { value: 'frontend', label: 'Frontend' },
  { value: 'backend', label: 'Backend' },
  { value: 'devops', label: 'DevOps' },
  { value: 'marketing', label: 'Marketing' }
]

const technologies = {
  ai: [
    { name: 'Machine Learning', icon: 'lucide:brain', level: 5 },
    { name: 'RAG', icon: 'lucide:database-zap', level: 6 },
    { name: 'LangChain', icon: 'lucide:link', level: 6 },
    { name: 'Antigravity', icon: 'lucide:rocket', level: 9 },
    { name: 'Claude Code', icon: 'lucide:terminal', level: 8 },
    { name: 'Codex', icon: 'lucide:code-2', level: 8 },
    { name: 'Hugging Face', icon: 'lucide:smile', level: 8 },
    { name: 'MCP', icon: 'lucide:plug', level: 8 },
    { name: 'Agentes', icon: 'lucide:bot', level: 9 },
    { name: 'Skill', icon: 'lucide:sparkles', level: 9 },
    { name: 'Automação', icon: 'lucide:workflow', level: 8 },
  ],
  frontend: [
    { name: 'JavaScript', icon: 'devicon:javascript', level: 9 },
    { name: 'Vue.js', icon: 'devicon:vuejs', level: 8 },
    { name: 'Nuxt.js', icon: 'devicon:nuxtjs', level: 8 },
    { name: 'TypeScript', icon: 'devicon:typescript', level: 9 },
    { name: 'Tailwind CSS', icon: 'devicon:tailwindcss', level: 8 },
    { name: 'HTML', icon: 'devicon:html5', level: 9 },
    { name: 'CSS', icon: 'devicon:css3', level: 9 },
    { name: 'React', icon: 'devicon:react', level: 8 },
    { name: 'Next.js', icon: 'devicon:nextjs', level: 7 },
    { name: 'Blade', icon: 'devicon:laravel', level: 7 },
    { name: 'Streamlit', icon: 'devicon:streamlit', level: 7 },
    { name: 'Angular', icon: 'devicon:angular', level: 7 },
  ],
  backend: [
    { name: 'Node.js', icon: 'devicon:nodejs', level: 7 },
    { name: 'GraphQL', icon: 'logos:graphql', level: 7 },
    { name: 'PostgreSQL', icon: 'devicon:postgresql', level: 8},
    { name: 'Go (Golang)', icon: 'devicon:go', level: 7 },
    { name: 'Python', icon: 'devicon:python', level: 7 },
    { name: 'C#', icon: 'devicon:csharp', level: 6 },
    { name: 'PHP', icon: 'devicon:php', level: 9 },
    { name: 'MySQL', icon: 'devicon:mysql', level: 8 },
    { name: 'Docker', icon: 'devicon:docker', level: 7 },
  ],
  devops: [
    { name: 'CI/CD', icon: 'lucide:git-merge', level: 7 },
    { name: 'Google Cloud', icon: 'devicon:googlecloud', level: 7 },
    { name: 'AWS', icon: 'devicon:amazonwebservices-wordmark', level: 7 },
    { name: 'Linux', icon: 'devicon:linux', level: 8 },
  ],
  marketing: [
    { name: 'Planejamento', icon: 'lucide:clipboard-list', level: 9 },
    { name: 'Estratégia', icon: 'lucide:target', level: 9 },
    { name: 'Publicidade', icon: 'lucide:megaphone', level: 9 },
    { name: 'Design', icon: 'lucide:palette', level: 9 },
    { name: 'Gestão de Projetos', icon: 'lucide:briefcase', level: 9 },
  ]
}
</script>
