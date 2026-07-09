# Technical Specification - Software Engineer Landing Page

## 1. Executive Summary & Objectives

Este documento serve como a "Fonte da Verdade" para a construção de uma **Landing Page Profissional** para um Engenheiro de Software, seguindo a stack tecnológica e padrões arquiteturais do projeto base. O objetivo principal é criar um portfólio de alto nível que demonstre autoridade técnica, apresente a experiência profissional, exiba tecnologias dominadas e facilite o networking com recrutadores e clientes.

A experiência deve transmitir profissionalismo, modernidade, credibilidade e organização, utilizando uma interface inspirada em produtos SaaS premium e dashboards modernos.

---

## 2. Tech Stack & Infrastructure

- **Framework**: Nuxt 4 (Modo de Compatibilidade 4 / Vue 3).
- **Linguagem**: TypeScript (Strict Mode).
- **Gerenciador de Pacotes**: `pnpm` (obrigatório para instalação e gestão de dependências).
- **Estilização**: Tailwind CSS + SCSS (padrão `@use`).
- **Engine / Build**: O site deve estar preparado para ser gerado de forma estática (SSG - Static Site Generation) via Nitro. O build final (`pnpm run generate` ou `pnpm generate`) resultará apenas em arquivos estáticos.
- **Hospedagem & Deploy**: O build final será colocado em um **servidor compartilhado na Hostinger**. Toda a arquitetura do projeto deve respeitar essa restrição (sem necessidade de runtime Node.js ativo no servidor de produção).
- **Ícones e Tipografia**: `@nuxt/icon` (Lucide Icons) e fontes nativas configuradas adequadamente.
- **Internacionalização**: `@nuxtjs/i18n` (PT, EN, ES).
- **Tema**: `@nuxtjs/color-mode` (Dark/Light mode suportado nativamente).
- **Animações**: Transições CSS/Tailwind nativas para microinterações e diretivas de entrada na viewport (fade/slide-up).

---

## 3. Design System & Visual Architecture

### 3.1 Estilo Visual
- **Design Moderno e Minimalista**: Evitar visuais infantis, excessos de gradientes ou efeitos exagerados. Layout limpo e escaneável.
- **Tema Padrão**: Dark Mode. O alternador de tema deve ser proeminente no Header.

### 3.2 Paleta de Cores Sugerida
- **Dark Mode (Padrão)**:
  - Background: `#0F172A` (Slate 900) ou `#121212`
  - Superfícies (Cards/Header): `#1E293B` (Slate 800) com bordas sutis (`rgba(255, 255, 255, 0.1)`)
  - Primária (Destaques): `#38BDF8` (Sky 400) ou `#818CF8` (Indigo 400)
  - Texto Principal: `#F8FAFC` (Slate 50)
  - Texto Secundário: `#94A3B8` (Slate 400)
- **Light Mode**:
  - Background: `#F8FAFC` (Slate 50)
  - Superfícies (Cards/Header): `#FFFFFF`
  - Primária (Destaques): `#0284C7` (Sky 600) ou `#4F46E5` (Indigo 600)
  - Texto Principal: `#0F172A` (Slate 900)
  - Texto Secundário: `#64748B` (Slate 500)

### 3.3 Tipografia
- **Fontes Primárias**: `Inter`, `Manrope`, `Plus Jakarta Sans` ou `Outfit` (Sem serifa).
- **Escala Sugerida**:
  - Título Principal (Hero): `text-5xl` ou `text-6xl`, font-bold, tracking-tight.
  - Títulos de Seção: `text-3xl`, font-semibold.
  - Subtítulos: `text-xl`, text-secundário.
  - Corpo de Texto: `text-base`, leading-relaxed.

### 3.4 Microinterações e Animações
- **Hover de Cards**: Elevação suave (shadow) e transição de borda para cor primária.
- **Botões**: Efeito de `scale` sutil e transição fluida de cor de background.
- **Scroll**: Elementos devem surgir de forma orquestrada (suave `fade-in` e `translate-y`) ao entrar na viewport.

---

## 4. Component Specifications & Page Structure (Wireframes Textuais)

### 4.1 Header Fixo
- **Comportamento**: `sticky top-0`, `z-50`, com fundo de efeito `backdrop-blur` (glassmorphism) e transparência progressiva ajustada pelo scroll.
- **Estrutura**:
  - **Esquerda**: Logo ou Nome do Profissional (ex: `[ Nome /&gt; ]`).
  - **Centro**: Menu de Navegação contendo âncoras para as seções da página.
  - **Direita**: Botão de alternância Tema (Dark/Light), Seletor de Idioma, CTA de Contato.

### 4.2 Hero Section
- **Visual**: Background tecnológico sofisticado com grid futurista de baixíssima opacidade ou gradientes estáticos discretos e imersivos.
- **Estrutura**:
  - **Imagem**: Foto profissional (obtida do GitHub via `<NuxtImg>` para performance).
  - **Conteúdo Central**:
    - Nome completo do profissional em título principal `<h1>`.
    - Cargo principal: "Engenheiro de Software".
    - Frase de Efeito: "Transformando problemas complexos em soluções escaláveis através da tecnologia."
  - **Badges de Idiomas**: Indicadores visuais para fluência (ex: [Português] [Inglês] [Espanhol]).
  - **Redes Sociais**: Ícones Lucide para GitHub e LinkedIn com hover states modernos.
  - **CTAs**: Botão Primário de alto contraste ("Entrar em contato") e Botão Secundário outline ("Visualizar projetos").

### 4.3 Stacks e Tecnologias
- **Visual**: Seção contendo Grid flexível de cards divididos por categoria.
- **Estrutura do Card**:
  - Categoria (ex: TI, DevOps, Gestão).
  - Ícone representativo.
  - Nome da tecnologia e Framework relacionado.
  - Badge com tempo de experiência.
  - **Indicador de Experiência Visual**: Barra composta por 10 marcadores (ex: `████████░░ 8/10`). As barras devem revelar a experiência com uma animação ao entrar na viewport.

### 4.4 Experiência Profissional
- **Visual**: Grid de múltiplas colunas em desktop e empilhamento vertical no mobile, focado em scannability.
- **Estrutura do Card (Item de Experiência)**:
  - Logo da Empresa / Ícone padronizado.
  - Nome da Empresa & Período.
  - Cargo Ocupado.
  - Descrição resumida destacando impactos e responsabilidades chave.
- **Interatividade**: Hover state moderno que gera leve elevação visual e foco.

### 4.5 Projetos em Destaque
- **Visual**: Carrossel moderno, responsivo e interativo ocupando espaço de destaque.
- **Estrutura do Slide**:
  - Imagem de preview do projeto.
  - Nome do Projeto e Breve descrição focada no valor gerado e tecnologia.
  - Tags de Tecnologias Utilizadas.
  - Ações: Link/Botão para demonstração e Ícone para repositório.
- **Controles**: Navegação por setas no desktop, swipe no mobile e dots para paginação.

### 4.6 Experiência Acadêmica
- **Visual**: Opção de UX recomendada - **Timeline Vertical**. Facilita a leitura cronológica e poupa espaço horizontal.
- **Estrutura da Entrada**:
  - Marcador visual na linha do tempo (timeline dot).
  - Instituição de Ensino.
  - Curso/Formação.
  - Período.
  - Descrição das atividades principais ou conquistas acadêmicas.

### 4.7 Footer
- **Estrutura**:
  - Nome do profissional & Informações de Copyright.
  - Acesso rápido: Links de GitHub, LinkedIn e E-mail.
  - Estética contida e minimalista, encerrando os fluxos visuais da página com clareza.

---

## 5. Recomendações de UX e Acessibilidade

### 5.1 UX (User Experience)
- **Escaneabilidade**: Adotar margens generosas (`whitespace`), agrupamento lógico e clara hierarquia tipográfica.
- **Performance de Conversão**: Múltiplos CTAs distribuídos na Hero, portfólio de projetos e contatos acessíveis imediatamente no Footer e Header.
- **Feedback Visual**: Toda ação (cliques, passagens de mouse, focus) deve refletir microinterações no layout de modo preditivo e não invasivo.

### 5.2 Acessibilidade (a11y)
- **Contraste Razoável**: Garantir que fundos Dark Mode contrastem com textos e não fatiguem a leitura (Compliance com WCAG AA no mínimo).
- **Navegação por Teclado**: Todo conteúdo iterativo (links, botões, carrossel, seletor de tema) deve estar acessível por `Tab` e ser visualmente denotado por `focus-visible`.
- **Compatibilidade com Leitores de Tela**: Atributos `aria-label` e `aria-hidden` para componentes de ícones apenas visuais e botões de UI isolados (ex: botão de Dark Mode).
- **Semântica HTML**: Uso obrigatório e consistente das tags de demarcação (`<nav>`, `<main>`, `<section>`, `<footer>`). Apenas o título principal da Hero Section deve usar `<h1>`.

---

## 6. Regras Arquiteturais Obrigatórias (@engineer)

- Não introduzir dependências que violem o *Rule* base do Nuxt 4, mantendo a performance Nitro e o uso restrito de auto-imports.
- Qualquer string apresentada no template deve ser roteada via `$t('key')` provida pelo i18n em `app/lang/`.
- Todos os componentes, composables e assets devem respeitar as convenções de subdiretórios restritos da raiz `app/` no projeto, não vazando para o root (exceto os estáticos em `public/`).

---

## 7. Acceptance Criteria (@qa)

- [ ] Zero resíduos ou referências de conteúdos de projetos institucionais de terceiros na especificação ou no bundle final gerado.
- [ ] Renderização correta em ambiente sem falhas de hidratação e pleno funcionamento SSR Safe.
- [ ] O Header e o mecanismo de alternância de tema funcionam com integridade e persistência.
- [ ] As visualizações de cards (tecnologias, experiência) reagem ao viewport com animações e reorganizam-se de forma coesa da quebra de `sm` (mobile) até resoluções `2xl` (desktop).
- [ ] Score alto (90+) nas métricas do Lighthouse reportando acessibilidade nativa e SEO coerentes com portfólios profissionais.
