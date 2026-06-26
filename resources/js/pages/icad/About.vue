<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import SectionHeading from '@/components/icad/SectionHeading.vue'
import StatCard from '@/components/icad/StatCard.vue'

const teamMembers = [
  { name: 'Dr. Amanda Wijaya', role: 'Chairperson', org: 'PT Global Investama' },
  { name: 'Bambang Santoso', role: 'Vice Chair', org: 'Santoso & Co. Law Firm' },
  { name: 'Citra Dewi', role: 'Secretary', org: 'Dewi Consulting' },
  { name: 'Eko Prasetyo', role: 'Treasurer', org: 'Mandiri Finance UAE' },
  { name: 'Fitri Handayani', role: 'Events Director', org: 'Handayani Events' },
  { name: 'Gilang Ramadhan', role: 'Membership Director', org: 'TechHub Abu Dhabi' },
]

const values = [
  {
    title: 'Unity (Persatuan)',
    desc: 'Bringing Indonesians together regardless of background, profession, or region of origin.',
  },
  {
    title: 'Mutual Cooperation (Gotong Royong)',
    desc: 'Supporting one another through community initiatives, mentorship, and shared resources.',
  },
  {
    title: 'Professional Excellence',
    desc: 'Promoting high standards in business conduct and professional development.',
  },
  {
    title: 'Cultural Pride',
    desc: 'Celebrating and preserving Indonesian culture, traditions, and language in the UAE.',
  },
]
</script>

<template>
  <Head title="About Us" />

  <section class="bg-gradient-to-br from-gray-900 to-gray-800 py-24">
    <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
      <h1 class="text-4xl font-bold text-white sm:text-5xl">About ICAD</h1>
      <p class="mx-auto mt-4 max-w-2xl text-lg text-gray-300">
        The Indonesian Community Abu Dhabi — serving our community since 2015
      </p>
    </div>
  </section>

  <section class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-12 lg:grid-cols-2">
        <div>
          <SectionHeading title="Our Mission" subtitle="What drives us every day." />
          <p class="leading-relaxed text-gray-600">
            ICAD is dedicated to uniting, representing, and empowering the Indonesian community in Abu Dhabi
            and the broader UAE. We serve as a bridge between Indonesia and the UAE, fostering meaningful
            connections across business, culture, and community welfare.
          </p>
          <p class="mt-4 leading-relaxed text-gray-600">
            From professionals and entrepreneurs to students and families, ICAD provides a welcoming home
            for every Indonesian in the UAE, helping them thrive personally and professionally.
          </p>
        </div>
        <div>
          <SectionHeading title="Our Vision" subtitle="Where we are headed." />
          <p class="leading-relaxed text-gray-600">
            To be the leading Indonesian community organization in the UAE — a vibrant, inclusive platform
            that enriches lives, strengthens cultural identity, and opens doors to business and career opportunities
            for the Indonesian diaspora.
          </p>
          <div class="mt-6 rounded-xl border bg-gray-50 p-6">
            <p class="text-sm font-semibold text-gray-900">Who We Serve</p>
            <ul class="mt-3 space-y-2 text-sm text-gray-600">
              <li class="flex items-center gap-2">
                <span class="h-1.5 w-1.5 rounded-full bg-[#CE1126]"></span>
                Indonesian expat professionals in the UAE
              </li>
              <li class="flex items-center gap-2">
                <span class="h-1.5 w-1.5 rounded-full bg-[#CE1126]"></span>
                Indonesian business owners and entrepreneurs
              </li>
              <li class="flex items-center gap-2">
                <span class="h-1.5 w-1.5 rounded-full bg-[#CE1126]"></span>
                Students and academic communities
              </li>
              <li class="flex items-center gap-2">
                <span class="h-1.5 w-1.5 rounded-full bg-[#CE1126]"></span>
                Families and individuals seeking community
              </li>
              <li class="flex items-center gap-2">
                <span class="h-1.5 w-1.5 rounded-full bg-[#CE1126]"></span>
                UAE-based companies with Indonesian interest
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-gray-50 py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <SectionHeading title="Our Values" centered />
      <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <div
          v-for="v in values"
          :key="v.title"
          class="rounded-xl border bg-white p-6 shadow-sm"
        >
          <h3 class="text-lg font-semibold text-gray-900">{{ v.title }}</h3>
          <p class="mt-2 text-sm leading-relaxed text-gray-600">{{ v.desc }}</p>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <SectionHeading title="Our Leadership Team" centered />
      <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <div
          v-for="member in teamMembers"
          :key="member.name"
          class="rounded-xl border bg-white p-6 text-center shadow-sm transition-all hover:shadow-md"
        >
          <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-red-50 text-lg font-bold text-[#CE1126]">
            {{ member.name.split(' ').map(w => w[0]).join('') }}
          </div>
          <h3 class="font-semibold text-gray-900">{{ member.name }}</h3>
          <p class="text-sm text-[#CE1126]">{{ member.role }}</p>
          <p class="mt-1 text-xs text-gray-500">{{ member.org }}</p>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-gray-50 py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <StatCard number="2015" label="Founded" />
        <StatCard number="500+" label="Members" />
        <StatCard number="30+" label="Annual Events" />
        <StatCard number="50+" label="Partners" />
      </div>
    </div>
  </section>
</template>
