<template>
  <section id="projects" class="py-20 bg-slate-100 dark:bg-slate-900/80">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center mb-16">
        <h2 class="text-4xl font-bold text-slate-900 dark:text-white">
          {{ $t('projects.title') }}
        </h2>
        <div class="flex gap-4">
          <button @click="scroll('left')" class="p-3 rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors" aria-label="Previous">
            <Icon name="lucide:chevron-left" class="w-6 h-6 text-slate-600 dark:text-slate-300" />
          </button>
          <button @click="scroll('right')" class="p-3 rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors" aria-label="Next">
            <Icon name="lucide:chevron-right" class="w-6 h-6 text-slate-600 dark:text-slate-300" />
          </button>
        </div>
      </div>

      <!-- Simple responsive grid mimicking a carousel if no actual carousel logic is needed, or a manual CSS snap carousel -->
      <div 
        ref="carouselRef" 
        @wheel="handleWheel"
        class="flex overflow-x-auto snap-x snap-mandatory gap-6 pb-8 hide-scrollbar scroll-smooth"
      >
        <div 
          v-for="(project, index) in projects" 
          :key="index"
          class="w-[80vw] max-w-[80vw] sm:max-w-none sm:w-auto sm:min-w-[300px] md:min-w-[400px] lg:min-w-[450px] shrink-0 snap-center p-4 bg-white dark:bg-slate-800 rounded-3xl border border-slate-200 dark:border-slate-700 shadow-sm"
        >
          <div class="w-full h-56 md:h-64 bg-slate-200 dark:bg-slate-700 rounded-2xl overflow-hidden mb-6 relative group">
            <img :src="project.image" :alt="project.title" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
          </div>
          
          <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 px-2">
            {{ project.title }}
          </h3>
          <p class="text-slate-600 dark:text-slate-400 text-sm mb-4 px-2 line-clamp-2">
            {{ project.description }}
          </p>
          
          <div class="flex flex-wrap gap-2 px-2 mb-4">
            <span 
              v-for="tech in project.techs" 
              :key="tech.name"
              class="flex items-center gap-1.5 px-2.5 py-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-xs font-semibold rounded-md"
            >
              <Icon :name="tech.icon" class="w-3.5 h-3.5" v-if="tech.icon" />
              {{ tech.name }}
            </span>
          </div>


        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { ref } from 'vue'

import chinesOnlineImg from '~/assets/images/card_chinesonline.svg'
import cinemaratonaImg from '~/assets/images/card_cinemaratona.svg'
import racaDeGatosImg from '~/assets/images/card_racadegatos.svg'
import boiaImg from '~/assets/images/card_boia.svg'
import abertamenteImg from '~/assets/images/card_abertamente.svg'

const carouselRef = ref<HTMLElement | null>(null)

const scroll = (direction: 'left' | 'right') => {
  if (carouselRef.value) {
    const scrollAmount = direction === 'left' ? -400 : 400
    carouselRef.value.scrollBy({ left: scrollAmount, behavior: 'smooth' })
  }
}

const handleWheel = (e: WheelEvent) => {
  if (carouselRef.value) {
    if (e.deltaY !== 0) {
      const { scrollLeft, scrollWidth, clientWidth } = carouselRef.value
      
      const isAtStart = scrollLeft === 0
      const isAtEnd = Math.abs(scrollWidth - clientWidth - scrollLeft) <= 1

      // Se estiver no limite esquerdo subindo o scroll, ou no limite direito descendo, deixa a página rolar normalmente
      if ((isAtStart && e.deltaY < 0) || (isAtEnd && e.deltaY > 0)) {
        return
      }

      e.preventDefault()
      carouselRef.value.scrollBy({ left: e.deltaY, behavior: 'auto' })
    }
  }
}

const projects = [
  {
    title: 'ChinêsOnline',
    description: 'App mobile contendo um quiz voltado aos estudantes de ideogramas chineses',
    image: chinesOnlineImg,
    techs: [
      { name: 'Android', icon: 'logos:android-icon' },
      { name: 'Kotlin', icon: 'logos:kotlin-icon' },
      { name: 'Postgres', icon: 'logos:postgresql' },
      { name: 'Neon', icon: 'lucide:database' },
      { name: 'GCP', icon: 'logos:google-cloud' },
      { name: 'Go', icon: 'logos:go' },
      { name: 'Firebase', icon: 'logos:firebase' }
    ],
    demo: '#',
    repo: '#'
  },
  {
    title: 'Cinemaratona',
    description: 'Indicações de filmes para assistir nas principais plataformas de streaming do Brasil',
    image: cinemaratonaImg,
    techs: [
      { name: 'React', icon: 'logos:react' },
      { name: 'MySql', icon: 'logos:mysql' },
      { name: 'GraphQL', icon: 'logos:graphql' },
      { name: 'Laravel', icon: 'logos:laravel' }
    ],
    demo: '#',
    repo: '#'
  },
  {
    title: 'Raça de Gatos',
    description: 'Blog com conteúdo informativo para criadores de gatos',
    image: racaDeGatosImg,
    techs: [
      { name: 'Wordpress', icon: 'logos:wordpress-icon' }
    ],
    demo: '#',
    repo: '#'
  },
  {
    title: 'Abertamente',
    description: 'Blog com conteúdo informativo voltado à saúde, nutrição e bem estar',
    image: abertamenteImg,
    techs: [
      { name: 'Laravel', icon: 'logos:laravel' },
      { name: 'Nuxt', icon: 'logos:nuxt-icon' },
      { name: 'MySQL', icon: 'logos:mysql' }
    ],
    demo: '#',
    repo: '#'
  },
  {
    title: 'Boia.app',
    description: 'Plataforma web para cálculo de ingredientes para ração animal',
    image: boiaImg,
    techs: [
      { name: 'Laravel', icon: 'logos:laravel' },
      { name: 'Nuxt', icon: 'logos:nuxt-icon' },
      { name: 'MySQL', icon: 'logos:mysql' }
    ],
    demo: '#',
    repo: '#'
  }
]
</script>

<style scoped>
.hide-scrollbar::-webkit-scrollbar {
  display: none;
}
.hide-scrollbar {
  -ms-overflow-style: none;
  scrollbar-width: none;
}
</style>
