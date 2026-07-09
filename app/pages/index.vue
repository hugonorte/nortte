<template>
  <div>
    <HeroSection />
    <AboutMe />
    <TechStackSection />
    <ExperienceSection />
    <ProjectsCarousel />
    <AcademicTimeline />
    <ContactSection />
    
    <!-- Elemento gatilho para o GA -->
    <div ref="bottomTrigger" class="h-1 w-full"></div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { useIntersectionObserver } from '@vueuse/core'

import HeroSection from '~/components/home/HeroSection.vue'
import AboutMe from '~/components/home/AboutMe.vue'
import TechStackSection from '~/components/home/TechStackSection.vue'
import ExperienceSection from '~/components/home/ExperienceSection.vue'
import ProjectsCarousel from '~/components/home/ProjectsCarousel.vue'
import AcademicTimeline from '~/components/home/AcademicTimeline.vue'
import ContactSection from '~/components/home/ContactSection.vue'

// Title now handled globally in app.vue

const bottomTrigger = ref(null)

const { stop } = useIntersectionObserver(
  bottomTrigger,
  ([{ isIntersecting }]) => {
    if (isIntersecting) {
      if (typeof window !== 'undefined' && (window as any).gtag) {
        (window as any).gtag('event', 'scroll_to_bottom', {
          event_category: 'engagement',
          event_label: 'Chegou ao final da Landing Page'
        })
      }
      stop()
    }
  },
  { threshold: 0.1 }
)
</script>
