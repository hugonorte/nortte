---
name: Technical Decisions & Rationale
description: Why specific tools/patterns were chosen and constraints to respect
type: reference
source: Extracted from memory system for .agents/memory/
---

# Technical Decisions & Rationale — Quick Reference

## Framework & Language

**Nuxt 4** (Vue 3 meta-framework)
- **Why**: Full-stack Vue with auto-routing, SSR/SSG, built-in image/font optimization
- **Constraint**: Compatibility version 4 — stay on latest Nuxt 4, don't downgrade
- **TypeScript Strict**: Required — all code must type-check

## Styling System

**Tailwind CSS v4 + SCSS**
- **Why**: Utility-first CSS for speed, SCSS for reusable values
- **Pattern**: `@use` imports only (no `@import`)
- **Dark mode**: Enabled by default, no toggle needed currently
- **PostCSS**: Configured as plugin in `nuxt.config.ts`

## i18n Strategy

**@nuxtjs/i18n v10**
- **Why**: Battle-tested, integrates seamlessly with Nuxt, supports 3 languages
- **Constraint**: `restructureDir: 'app'` must be set for langDir resolution to work
- **Languages**: PT-BR (default), EN-US, ES-ES
- **Cookie**: Auto-detection + cookie-based persistence
- **Why 3 languages**: PSTG targets international market (Portugal, Spain, UK clients)

**Recent fix** (2026-04-29): `langDir: 'lang'` paired with `restructureDir: 'app'`
- Do NOT change this — Nuxt 4 requires explicit restructureDir

## Testing

**Unit/Component**: Vitest + @nuxt/test-utils + happy-dom
- **Why Vitest**: Fast, Vite-native, better than Jest for Vue 3
- **Why happy-dom**: Lighter than jsdom, sufficient for unit tests
- **Pattern**: Co-located `.spec.ts` files next to components

**E2E**: Cypress
- **Why**: Full browser testing, great for complex user flows (proposals, forms)
- **Pattern**: Separate `cypress/` folder, runs in CI

## Form Validation

**Vee-Validate + Zod**
- **Why**: Type-safe form validation (Zod schemas), Vue integration (Vee-Validate)
- **Used in**: ProposalForm component
- **Pattern**: Define Zod schema, pass to Vee-Validate form

## Data Visualization

**D3 + TopoJSON**
- **Why**: PSTG needs geographic/technical visualizations (maps, charts)
- **Used in**: Map component (locations.json)
- **Pattern**: Load TopoJSON, project with D3, render as SVG

## SEO & Meta

**@nuxtjs/seo** (Unhead-based)
- **Why**: Automatic sitemap, robots.txt, OG image generation, SEO best practices
- **Config**: `site` object in `nuxt.config.ts` (name, url, description)
- **Pattern**: Use `useHead()` composable or `useSeoMeta()` in components

## Backend Integration (Nitro)

**Suite CRM API**
- Environment vars: `SUITE_CRM_*` (URL, user, password, ID, secret)
- Constraint: These are server-only variables (never expose to client)

**Google OAuth + Calendar**
- Environment vars: `ID_CLIENTE_OAUTH`, `GOOGLE_CLIENT_SECRET`, `GOOGLE_REFRESH_TOKEN`, `GOOGLE_CALENDAR_ID`, `GOOGLE_ACCESS_TOKEN`
- Constraint: OAuth tokens are sensitive — handle only server-side

## Icons & Components

**Lucide Vue** (via @nuxt/icon)
- **Why**: Modern, SVG-based, tree-shakeable icon library
- **Pattern**: `<Icon name="lucide:icon-name" />`

## Image Optimization

**@nuxt/image**
- **Why**: Automatic format negotiation (WebP, AVIF), responsive sizing, lazy loading
- **Pattern**: Use `<NuxtImg>` instead of `<img>`

## Animation

**@vueuse/motion**
- **Why**: Directive-based animations, performant, integrates with Vite
- **Pattern**: `v-motion` directive on DOM elements

## Node Version Requirement

**Node 22+** (strict)
- **Why**: Nuxt 4 and new TypeScript require Node 22
- **Constraint**: Do NOT support older Node versions
- **npm install flag**: `--legacy-peer-deps` (due to strict peer deps in Unhead ecosystem)

## Build & Deploy

**SSG (Static Site Generation)**
```bash
npm run generate  # Creates static .html files
```
- **Why**: PSTG is a mostly static site with forms
- **Fallback**: Nitro can handle dynamic routes if needed

## No CSR-Only Pattern

**Constraint**: Avoid Client-Side Rendering only
- Nuxt should pre-render as much as possible
- This helps SEO and performance

## Composables Over Global State

**Pattern**: Use composables for shared logic, not Pinia/Vuex
- **Why**: PSTG's state needs are minimal
- **If needed later**: Could add Pinia, but prefer composables first

## Critical Constraints (Never Violate)

1. ✅ **TypeScript strict mode** — no `any` without reason
2. ✅ **i18n `restructureDir: 'app'`** — required for Nuxt 4
3. ✅ **No relative imports crossing directories** — use `~` alias
4. ✅ **Component props always typed** — use `defineProps<{}>()`
5. ✅ **SCSS `@use` only** — no `@import`
6. ✅ **No Options API** — use `<script setup>` only
7. ✅ **All 3 language files in sync** — pt-BR, en-US, es-ES
8. ✅ **Server-only env vars** — never expose to client
