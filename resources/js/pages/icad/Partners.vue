<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'
import SectionHeading from '@/components/icad/SectionHeading.vue'
import { Award, Heart, Handshake, ArrowRight, Building } from '@lucide/vue'

const foundationPartners = [
  { name: 'Abu Dhabi Chamber of Commerce', tier: 'Foundation' },
  { name: 'Indonesian Embassy Abu Dhabi', tier: 'Foundation' },
  { name: 'Mandiri Bank UAE', tier: 'Foundation' },
  { name: 'Garuda Indonesia', tier: 'Foundation' },
]

const corporatePartners = [
  { name: 'Pertamina International', tier: 'Corporate' },
  { name: 'Telkom Indonesia', tier: 'Corporate' },
  { name: 'Bank Negara Indonesia (BNI)', tier: 'Corporate' },
  { name: 'BRI UAE Branch', tier: 'Corporate' },
  { name: 'Indofood International', tier: 'Corporate' },
  { name: 'Kalbe Farma UAE', tier: 'Corporate' },
  { name: 'JNE Express UAE', tier: 'Corporate' },
  { name: 'Sinar Mas Group', tier: 'Corporate' },
]

const communityPartners = [
  { name: 'Indonesian Student Association UAE', tier: 'Community' },
  { name: 'Nusantara Arts Foundation', tier: 'Community' },
  { name: 'Indonesian Mosque Abu Dhabi', tier: 'Community' },
  { name: 'Batik Lovers UAE', tier: 'Community' },
  { name: 'Indonesian Cuisine Collective', tier: 'Community' },
  { name: 'Pertiwi Women\'s Association', tier: 'Community' },
]
</script>

<template>
  <Head title="Partners & Sponsors" />

  <section class="bg-gradient-to-br from-gray-900 to-gray-800 py-24">
    <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
      <h1 class="text-4xl font-bold text-white sm:text-5xl">Partners & Sponsors</h1>
      <p class="mx-auto mt-4 max-w-2xl text-lg text-gray-300">
        Together, we build a stronger community. Meet the organizations that support ICAD.
      </p>
    </div>
  </section>

  <section class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <SectionHeading
        title="Foundation Partners"
        subtitle="Our cornerstone partners who make our mission possible."
      />
      <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <div
          v-for="partner in foundationPartners"
          :key="partner.name"
          class="flex flex-col items-center rounded-xl border bg-white p-8 text-center shadow-sm transition-all hover:-translate-y-1 hover:shadow-lg"
        >
          <div class="mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-[#CE1126]/10 text-[#CE1126]">
            <Award class="h-8 w-8" />
          </div>
          <p class="text-sm font-semibold text-gray-900">{{ partner.name }}</p>
          <span class="mt-2 rounded-full bg-[#CE1126]/10 px-3 py-0.5 text-xs font-medium text-[#CE1126]">
            {{ partner.tier }}
          </span>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-gray-50 py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <SectionHeading title="Corporate Partners" />
      <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <div
          v-for="partner in corporatePartners"
          :key="partner.name"
          class="flex items-center gap-4 rounded-xl border bg-white p-6 shadow-sm transition-all hover:shadow-md"
        >
          <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-gray-100 text-gray-600">
            <Building class="h-6 w-6" />
          </div>
          <div>
            <p class="text-sm font-semibold text-gray-900">{{ partner.name }}</p>
            <span class="text-xs text-gray-500">{{ partner.tier }} Partner</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <SectionHeading title="Community Partners" subtitle="Working together to serve the Indonesian community." />
      <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <div
          v-for="partner in communityPartners"
          :key="partner.name"
          class="flex items-center gap-4 rounded-xl border bg-white p-6 shadow-sm transition-all hover:shadow-md"
        >
          <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-red-50 text-[#CE1126]">
            <Heart class="h-6 w-6" />
          </div>
          <div>
            <p class="text-sm font-semibold text-gray-900">{{ partner.name }}</p>
            <span class="text-xs text-gray-500">{{ partner.tier }} Partner</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-[#CE1126] py-16">
    <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
      <h2 class="text-3xl font-bold text-white">Become a Partner</h2>
      <p class="mx-auto mt-4 max-w-2xl text-lg text-red-100">
        Partner with ICAD and connect your organization with the vibrant Indonesian community in Abu Dhabi.
      </p>
      <div class="mt-8 flex flex-wrap justify-center gap-4">
        <Link
          href="/contact"
          class="inline-flex items-center gap-2 rounded-lg bg-white px-6 py-3 text-sm font-semibold text-[#CE1126] transition-all hover:bg-gray-100"
        >
          Become a Partner
          <ArrowRight class="h-4 w-4" />
        </Link>
      </div>
    </div>
  </section>
</template>

