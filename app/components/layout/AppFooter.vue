<template>
  <footer class="w-full py-8 border-t border-slate-200 dark:border-slate-800 mt-auto bg-slate-50 dark:bg-slate-900">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-4">
      <div class="text-sm text-slate-500 dark:text-slate-400">
        &copy; {{ currentYear }} Hugo Norte. {{ $t('footer.copyright') }}
      </div>
      
      <div class="flex items-center gap-4">
        <a 
          href="https://github.com/hugonorte" 
          target="_blank" 
          rel="noopener noreferrer"
          class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 transition-colors"
          aria-label="GitHub"
        >
          <Icon name="lucide:github" class="w-5 h-5" />
        </a>
        <a 
          href="https://linkedin.com/in/hugonorte" 
          target="_blank" 
          rel="noopener noreferrer"
          class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 transition-colors"
          aria-label="LinkedIn"
        >
          <Icon name="lucide:linkedin" class="w-5 h-5" />
        </a>
        <a 
          href="mailto:contato@hugonorte.com.br" 
          class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 transition-colors"
          aria-label="E-mail"
        >
          <Icon name="lucide:mail" class="w-5 h-5" />
        </a>
      </div>
    </div>
  </footer>
</template>

<script setup lang="ts">
const currentYear = new Date().getFullYear()
</script>
