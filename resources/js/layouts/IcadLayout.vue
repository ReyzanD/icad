<script setup lang="ts">
import { ref, computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import { Menu, X, Globe, ChevronDown } from '@lucide/vue'
import { onClickOutside } from '@vueuse/core'

const { locale } = usePage().props as { locale?: string }

const mobileMenuOpen = ref(false)
const langOpen = ref(false)
const langRef = ref<HTMLElement | null>(null)
const currentLang = ref(locale || 'en')

type Lang = 'en' | 'id'
const t = (en: string, id: string) => currentLang.value === 'id' ? id : en

onClickOutside(langRef, () => { langOpen.value = false })

const navLinks = computed(() => [
  { href: '/', label: t('Home', 'Beranda') },
  { href: '/about', label: t('About Us', 'Tentang Kami') },
  { href: '/membership', label: t('Membership', 'Keanggotaan') },
  { href: '/events', label: t('Events', 'Acara') },
  { href: '/news', label: t('News & Resources', 'Berita & Sumber') },
  { href: '/partners', label: t('Partners', 'Mitra') },
  { href: '/contact', label: t('Contact', 'Kontak') },
])
</script>

<template>
  <div class="flex min-h-screen flex-col">
    <header class="fixed top-0 left-0 right-0 z-50 border-b bg-white/95 backdrop-blur-sm">
      <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
        <Link href="/" class="flex items-center gap-3">
          <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-[#CE1126] text-white text-sm font-bold">
            ICAD
          </div>
          <div class="hidden sm:block">
            <p class="text-sm font-semibold leading-tight text-gray-900">ICAD</p>
            <p class="text-xs leading-tight text-gray-500">Indonesian Community Abu Dhabi</p>
          </div>
        </Link>

        <nav class="hidden items-center gap-1 lg:flex">
          <Link
            v-for="link in navLinks"
            :key="link.href"
            :href="link.href"
            class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 hover:text-[#CE1126]"
            :class="{ 'text-[#CE1126] bg-red-50': $page.url === link.href }"
          >
            {{ link.label }}
          </Link>
        </nav>

        <div class="flex items-center gap-2">
          <div ref="langRef" class="relative">
            <button
              @click="langOpen = !langOpen"
              class="flex items-center gap-1.5 rounded-md px-3 py-2 text-sm font-medium text-gray-600 transition-colors hover:bg-gray-100"
            >
              <Globe class="h-4 w-4" />
              <span class="hidden sm:inline">{{ currentLang === 'en' ? 'EN' : 'ID' }}</span>
              <ChevronDown class="h-3 w-3" />
            </button>
            <div
              v-if="langOpen"
              class="absolute right-0 mt-1 w-28 rounded-lg border bg-white py-1 shadow-lg"
            >
              <button
                @click="currentLang = 'en'; langOpen = false"
                class="flex w-full items-center px-3 py-2 text-sm hover:bg-gray-50"
                :class="{ 'font-semibold text-[#CE1126]': currentLang === 'en' }"
              >
                English
              </button>
              <button
                @click="currentLang = 'id'; langOpen = false"
                class="flex w-full items-center px-3 py-2 text-sm hover:bg-gray-50"
                :class="{ 'font-semibold text-[#CE1126]': currentLang === 'id' }"
              >
                Bahasa Indonesia
              </button>
            </div>
          </div>

          <button
            @click="mobileMenuOpen = !mobileMenuOpen"
            class="rounded-md p-2 text-gray-600 hover:bg-gray-100 lg:hidden"
          >
            <Menu v-if="!mobileMenuOpen" class="h-5 w-5" />
            <X v-else class="h-5 w-5" />
          </button>
        </div>
      </div>

      <div
        v-if="mobileMenuOpen"
        class="border-t lg:hidden"
      >
        <div class="space-y-1 px-4 py-3">
          <Link
            v-for="link in navLinks"
            :key="link.href"
            :href="link.href"
            @click="mobileMenuOpen = false"
            class="block rounded-md px-3 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 hover:text-[#CE1126]"
            :class="{ 'text-[#CE1126] bg-red-50': $page.url === link.href }"
          >
            {{ link.label }}
          </Link>
        </div>
      </div>
    </header>

    <main class="flex-1 pt-16">
      <slot />
    </main>

    <footer class="border-t bg-gray-900 text-gray-300">
      <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
          <div>
            <div class="mb-4 flex items-center gap-3">
              <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-[#CE1126] text-white text-sm font-bold">
                ICAD
              </div>
              <div>
                <p class="text-sm font-semibold text-white">ICAD</p>
                <p class="text-xs text-gray-400">Indonesian Community Abu Dhabi</p>
              </div>
            </div>
            <p class="text-sm leading-relaxed text-gray-400">
              {{ currentLang === 'id'
                ? 'Menghubungkan dan memberdayakan komunitas Indonesia di Abu Dhabi dan UEA.'
                : 'Connecting and empowering the Indonesian community in Abu Dhabi and the UAE.' }}
            </p>
          </div>

          <div>
            <h3 class="mb-4 text-sm font-semibold text-white">
              {{ currentLang === 'id' ? 'Tautan Cepat' : 'Quick Links' }}
            </h3>
            <ul class="space-y-2 text-sm">
              <li v-for="link in navLinks" :key="link.href">
                <Link :href="link.href" class="transition-colors hover:text-[#D4A84B]">
                  {{ link.label }}
                </Link>
              </li>
            </ul>
          </div>

          <div>
            <h3 class="mb-4 text-sm font-semibold text-white">
              {{ currentLang === 'id' ? 'Hubungi Kami' : 'Contact Us' }}
            </h3>
            <ul class="space-y-2 text-sm text-gray-400">
              <li>Abu Dhabi, UAE</li>
              <li>info@icad.ae</li>
              <li>+971 2 XXX XXXX</li>
            </ul>
          </div>

          <div>
            <h3 class="mb-4 text-sm font-semibold text-white">
              {{ currentLang === 'id' ? 'Ikuti Kami' : 'Follow Us' }}
            </h3>
            <div class="flex gap-3">
            <a
              href="https://www.instagram.com/"
              target="_blank"
              rel="noopener noreferrer"
              class="flex h-9 w-9 items-center justify-center rounded-full bg-gray-800 text-gray-400 transition-colors hover:bg-[#CE1126] hover:text-white"
              :title="'Instagram'"
            >
              <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
              </svg>
            </a>
            <a
              href="https://www.facebook.com/"
              target="_blank"
              rel="noopener noreferrer"
              class="flex h-9 w-9 items-center justify-center rounded-full bg-gray-800 text-gray-400 transition-colors hover:bg-[#CE1126] hover:text-white"
              :title="'Facebook'"
            >
              <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
              </svg>
            </a>
            <a
              href="https://www.linkedin.com/"
              target="_blank"
              rel="noopener noreferrer"
              class="flex h-9 w-9 items-center justify-center rounded-full bg-gray-800 text-gray-400 transition-colors hover:bg-[#CE1126] hover:text-white"
              :title="'LinkedIn'"
            >
              <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                <rect width="4" height="12" x="2" y="9"/>
                <circle cx="4" cy="4" r="2"/>
              </svg>
            </a>
            <a
              href="https://www.youtube.com/"
              target="_blank"
              rel="noopener noreferrer"
              class="flex h-9 w-9 items-center justify-center rounded-full bg-gray-800 text-gray-400 transition-colors hover:bg-[#CE1126] hover:text-white"
              :title="'YouTube'"
            >
              <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.94 2C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/>
                <polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/>
              </svg>
            </a>
          </div>
          </div>
        </div>

        <div class="mt-8 border-t border-gray-800 pt-8 text-center text-sm text-gray-500">
          <p>&copy; {{ new Date().getFullYear() }} ICAD. {{ currentLang === 'id' ? 'Hak cipta dilindungi.' : 'All rights reserved.' }}</p>
        </div>
      </div>
    </footer>
  </div>
</template>
