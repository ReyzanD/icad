<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import SectionHeading from '@/components/icad/SectionHeading.vue'
import { FileText, TrendingUp, BookOpen, Download } from '@lucide/vue'

const newsItems = [
  {
    title: 'Indonesia-UAE Trade Volume Reaches New Heights in 2025',
    date: '15 Jun 2025',
    category: 'Trade Update',
    excerpt: 'Bilateral trade between Indonesia and the UAE has grown significantly, with new partnerships in renewable energy and technology sectors.',
  },
  {
    title: 'ICAD Welcomes New Corporate Partners for 2025-2026',
    date: '1 Jun 2025',
    category: 'Community News',
    excerpt: 'Five new corporate partners have joined ICAD, expanding opportunities for members across various industries.',
  },
  {
    title: 'Indonesian Expat Remittances Grow 12% Year-on-Year',
    date: '20 May 2025',
    category: 'Economic Update',
    excerpt: 'Indonesian workers in the UAE continue to contribute significantly to the national economy through remittances.',
  },
  {
    title: 'Batik Day Celebrated Across UAE with ICAD Events',
    date: '2 Oct 2025',
    category: 'Community News',
    excerpt: 'ICAD hosted Batik Day celebrations in Abu Dhabi and Dubai, featuring workshops and cultural performances.',
  },
  {
    title: 'New Direct Flight Route: Abu Dhabi to Jakarta Announced',
    date: '10 Apr 2025',
    category: 'Trade Update',
    excerpt: 'A new direct flight route between Abu Dhabi and Jakarta will strengthen business and tourism ties.',
  },
  {
    title: 'ICAD Scholarship Program Opens for 2025',
    date: '1 Mar 2025',
    category: 'Community News',
    excerpt: 'Applications are now open for the ICAD scholarship program supporting Indonesian students in the UAE.',
  },
]

const resources = [
  { title: 'UAE Labour Law Guide for Indonesian Workers', type: 'PDF', size: '2.4 MB' },
  { title: 'Doing Business in the UAE: An Indonesian Perspective', type: 'PDF', size: '3.1 MB' },
  { title: 'Indonesia-UAE Trade & Investment Report 2025', type: 'PDF', size: '5.7 MB' },
  { title: 'ICAD Member Benefits Handbook', type: 'PDF', size: '1.8 MB' },
  { title: 'Guide to Indonesian Schools in the UAE', type: 'PDF', size: '2.2 MB' },
]
</script>

<template>
  <Head title="News & Resources" />

  <section class="bg-gradient-to-br from-gray-900 to-gray-800 py-24">
    <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
      <h1 class="text-4xl font-bold text-white sm:text-5xl">News & Resources</h1>
      <p class="mx-auto mt-4 max-w-2xl text-lg text-gray-300">
        Stay informed with the latest community news, trade updates, and knowledge resources
      </p>
    </div>
  </section>

  <section class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="mb-8 flex items-center gap-2">
        <button
          v-for="cat in ['All', 'Community News', 'Trade Update', 'Economic Update']"
          :key="cat"
          class="rounded-full border px-4 py-1.5 text-sm font-medium transition-colors hover:bg-gray-100"
          :class="cat === 'All' ? 'bg-[#CE1126] text-white border-[#CE1126]' : 'text-gray-700'"
        >
          {{ cat }}
        </button>
      </div>
      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <article
          v-for="item in newsItems"
          :key="item.title"
          class="group rounded-xl border bg-white p-6 shadow-sm transition-all hover:-translate-y-1 hover:shadow-lg"
        >
          <span
            class="inline-block rounded-full bg-red-50 px-2.5 py-0.5 text-xs font-medium text-[#CE1126]"
          >
            {{ item.category }}
          </span>
          <p class="mt-3 text-xs text-gray-500">{{ item.date }}</p>
          <h3 class="mt-2 text-base font-semibold text-gray-900 group-hover:text-[#CE1126]">
            {{ item.title }}
          </h3>
          <p class="mt-2 text-sm leading-relaxed text-gray-600">{{ item.excerpt }}</p>
          <button class="mt-4 text-sm font-medium text-[#CE1126] hover:underline">Read more</button>
        </article>
      </div>
    </div>
  </section>

  <section class="bg-gray-50 py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <SectionHeading title="Knowledge Bank" subtitle="Essential resources for the Indonesian community in the UAE." />
      <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <div
          v-for="resource in resources"
          :key="resource.title"
          class="flex items-center justify-between rounded-lg border bg-white p-4 shadow-sm transition-all hover:shadow-md"
        >
          <div class="flex items-start gap-3">
            <FileText class="mt-0.5 h-5 w-5 shrink-0 text-[#CE1126]" />
            <div>
              <p class="text-sm font-medium text-gray-900">{{ resource.title }}</p>
              <p class="text-xs text-gray-500">{{ resource.type }} — {{ resource.size }}</p>
            </div>
          </div>
          <button class="flex h-8 w-8 items-center justify-center rounded-md text-gray-400 transition-colors hover:bg-gray-100 hover:text-[#CE1126]">
            <Download class="h-4 w-4" />
          </button>
        </div>
      </div>
    </div>
  </section>
</template>
