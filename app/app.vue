<template>
  <div>
    <NuxtLayout>
      <NuxtPage />
    </NuxtLayout>
  </div>
</template>

<script setup lang="ts">
import { useI18n } from '#imports'

const { t } = useI18n()

// Configurações globais de SEO podem ir aqui ou no nuxt.config
useHead({
  title: () => t('site.title'),
  htmlAttrs: {
    lang: 'pt-BR',
  },
  script: [
    {
      src: 'https://www.googletagmanager.com/gtag/js?id=G-PCS90JZ2C5',
      async: true
    },
    {
      innerHTML: `
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-PCS90JZ2C5');
      `,
      type: 'text/javascript'
    }
  ]
})
</script>
