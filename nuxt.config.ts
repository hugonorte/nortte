import tailwindcss from '@tailwindcss/vite'

export default defineNuxtConfig({
  future: {
    compatibilityVersion: 4,
  },
  
  srcDir: 'app/',
  
  ssr: true,
  
  nitro: {
    preset: 'static',
  },

  app: {
    head: {
      link: [
        { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
      ]
    }
  },
  
  modules: [
    '@nuxt/ui',
    '@nuxtjs/i18n',
    '@nuxtjs/color-mode',
    '@nuxt/image',
    '@nuxt/icon',
    '@nuxt/fonts',
    '@vueuse/nuxt',
    '@vueuse/motion/nuxt',
  ],
  
  css: [
    '~/assets/css/main.css',
  ],
  
  colorMode: {
    classSuffix: '',
    preference: 'dark',
    fallback: 'dark',
  },
  
  i18n: {
    strategy: 'prefix_except_default',
    defaultLocale: 'pt-BR',
    locales: [
      { code: 'pt-BR', file: 'pt-BR.json', name: 'Português' },
      { code: 'en-US', file: 'en-US.json', name: 'English' },
      { code: 'es-ES', file: 'es-ES.json', name: 'Español' },
    ],
    restructureDir: 'app',
    langDir: 'lang/',
  },
  

  hooks: {
    'nitro:config'(nitroConfig) {
      if (nitroConfig.imports) {
        if (Array.isArray(nitroConfig.imports.imports)) {
          nitroConfig.imports.imports = nitroConfig.imports.imports.filter((i: any) =>
            !(i.name === 'useAppConfig' && i.from.includes('@nuxt/nitro-server'))
          );
        }
        nitroConfig.imports.presets = (nitroConfig.imports.presets || []).map((preset: any) => {
          if (typeof preset === 'object' && preset.from === 'nitropack/runtime/internal/config') {
            return {
              ...preset,
              imports: (preset.imports || []).filter((i: string) => i !== 'useAppConfig')
            };
          }
          return preset;
        });
      }
    }
  }
})
