<template>
  <section id="contact" class="py-20 bg-slate-50 dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800">
    <div class="container mx-auto px-4 max-w-3xl">
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-slate-900 dark:text-white mb-4">
          Entre em Contato
        </h2>
        <p class="text-lg text-slate-600 dark:text-slate-400">
          Vamos conversar sobre o seu próximo projeto. Preencha o formulário abaixo e entrarei em contato o mais breve possível.
        </p>
      </div>

      <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 p-6 md:p-8">
        <form @submit.prevent="handleSubmit" class="space-y-6">
          
          <!-- Honeypot field (hidden from real users, visible to bots) -->
          <div class="absolute opacity-0 -z-10 h-0 w-0 overflow-hidden" aria-hidden="true">
            <label for="honeypot-website">Website (deixe em branco se for humano)</label>
            <input 
              id="honeypot-website" 
              type="text" 
              name="website" 
              v-model="form.honeypot" 
              tabindex="-1" 
              autocomplete="off" 
            />
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nome -->
            <div>
              <label for="nome" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                Nome completo
              </label>
              <input
                id="nome"
                v-model="form.nome"
                type="text"
                required
                class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-colors"
                placeholder="Seu nome"
              />
            </div>

            <!-- Empresa -->
            <div>
              <label for="empresa" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                Empresa
              </label>
              <input
                id="empresa"
                v-model="form.empresa"
                type="text"
                required
                class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-colors"
                placeholder="Sua empresa"
              />
            </div>
          </div>

          <!-- Mensagem -->
          <div>
            <label for="mensagem" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
              Mensagem
            </label>
            <textarea
              id="mensagem"
              v-model="form.mensagem"
              required
              rows="5"
              class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-colors resize-none"
              placeholder="Como posso te ajudar?"
            ></textarea>
          </div>

          <!-- Botão Enviar -->
          <button
            type="submit"
            :disabled="isSubmitting"
            class="w-full sm:w-auto px-8 py-3.5 text-base font-semibold text-white bg-primary-600 hover:bg-primary-700 dark:bg-primary-700 dark:hover:bg-primary-600 rounded-lg shadow-sm hover:shadow transition-all disabled:opacity-70 disabled:cursor-not-allowed flex items-center justify-center gap-2"
          >
            <span v-if="isSubmitting">Enviando...</span>
            <span v-else>Enviar Mensagem</span>
            <Icon v-if="!isSubmitting" name="lucide:send" class="w-4 h-4" />
          </button>
          
          <p v-if="successMessage" class="text-green-600 dark:text-green-400 font-medium mt-4 text-center">
            {{ successMessage }}
          </p>
        </form>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { ref, reactive } from 'vue'

const form = reactive({
  nome: '',
  empresa: '',
  mensagem: '',
  honeypot: ''
})

const isSubmitting = ref(false)
const successMessage = ref('')

const handleSubmit = async () => {
  // Honeypot check: Se o campo honeypot foi preenchido, é um bot
  if (form.honeypot) {
    console.warn('Bot detectado pelo Honeypot. Requisição ignorada.')
    // Finge sucesso para o bot
    successMessage.value = 'Mensagem enviada com sucesso!'
    return
  }

  isSubmitting.value = true
  
  try {
    // Chamada para o script PHP
    await $fetch('/send-mail.php', {
      method: 'POST',
      body: {
        nome: form.nome,
        empresa: form.empresa,
        mensagem: form.mensagem,
        honeypot: form.honeypot
      }
    })
    
    successMessage.value = 'Obrigado pelo contato! Mensagem enviada com sucesso.'
    
    // Resetar o form (exceto honeypot)
    form.nome = ''
    form.empresa = ''
    form.mensagem = ''
    
    // Limpar mensagem de sucesso após 5 segundos
    setTimeout(() => {
      successMessage.value = ''
    }, 5000)
    
  } catch (error: any) {
    console.error('Erro ao enviar form:', error)
    alert(error?.data?.error || 'Ocorreu um erro ao enviar a mensagem. Tente novamente mais tarde.')
  } finally {
    isSubmitting.value = false
  }
}
</script>
