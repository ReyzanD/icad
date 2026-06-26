<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'
import SectionHeading from '@/components/icad/SectionHeading.vue'
import EventCard from '@/components/icad/EventCard.vue'
import StatCard from '@/components/icad/StatCard.vue'
import { ArrowRight, Users, Briefcase, Handshake, Calendar } from '@lucide/vue'

const upcomingEvents = [
  {
    title: 'Indonesian Independence Day Celebration',
    date: '17 Aug 2026',
    time: '10:00 - 18:00',
    location: 'Abu Dhabi',
    type: 'Cultural',
    description: 'Join us for a grand celebration of Indonesia\'s Independence Day with traditional performances, food, and community gatherings.',
  },
  {
    title: 'Business Networking Mixer — Q3 2026',
    date: '12 Sep 2026',
    time: '18:30 - 21:00',
    location: 'Downtown Abu Dhabi',
    type: 'Business',
    description: 'Connect with Indonesian professionals and business leaders in Abu Dhabi. Expand your network and explore new opportunities.',
  },
  {
    title: 'Batik Day Workshop',
    date: '2 Oct 2026',
    time: '14:00 - 17:00',
    location: 'Cultural Centre, Abu Dhabi',
    type: 'Cultural',
    description: 'Celebrate Batik Day with a hands-on workshop. Learn about the history and art of Indonesian batik.',
  },
]

const stats = [
  { number: '500+', label: 'Community Members' },
  { number: '50+', label: 'Partner Organizations' },
  { number: '30+', label: 'Annual Events' },
  { number: '10+', label: 'Years Serving UAE' },
]
</script>

<template>
  <Head title="Home" />

  <section class="relative flex min-h-[80vh] items-center overflow-hidden bg-gradient-to-br from-gray-900 via-gray-800 to-[#CE1126]/30">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wMyI+PHBhdGggZD0iTTM2IDM0djItSDI0di0yaDEyek0zNiAyNHYySDI0di0yaDEyeiIvPjwvZz48L2c+PC9zdmc+')] opacity-40"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
      <div class="max-w-3xl">
        <span class="inline-block rounded-full bg-white/10 px-4 py-1.5 text-sm font-medium text-white backdrop-blur-sm">
          Indonesian Community Abu Dhabi
        </span>
        <h1 class="mt-6 text-4xl font-bold leading-tight text-white sm:text-5xl lg:text-6xl">
          Connecting Indonesians<br />
          <span class="text-[#D4A84B]">in the Heart of the UAE</span>
        </h1>
        <p class="mt-6 max-w-2xl text-lg leading-relaxed text-gray-300">
          ICAD is the premier community organization for Indonesians living and working in Abu Dhabi
          and across the UAE — fostering business connections, cultural celebration, and community support.
        </p>
        <div class="mt-8 flex flex-wrap gap-4">
          <Link
            href="/about"
            class="inline-flex items-center gap-2 rounded-lg bg-[#CE1126] px-6 py-3 text-sm font-semibold text-white transition-all hover:bg-red-700 hover:shadow-lg"
          >
            Learn More
            <ArrowRight class="h-4 w-4" />
          </Link>
          <Link
            href="/membership"
            class="inline-flex items-center gap-2 rounded-lg border border-white/30 bg-white/10 px-6 py-3 text-sm font-semibold text-white backdrop-blur-sm transition-all hover:bg-white/20"
          >
            Join ICAD
          </Link>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <StatCard v-for="stat in stats" :key="stat.label" :number="stat.number" :label="stat.label" />
      </div>
    </div>
  </section>

  <section class="bg-gray-50 py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <SectionHeading
        title="Upcoming Events"
        subtitle="Join us at our next community gathering, business networking session, or cultural celebration."
        centered
      />
      <div class="grid gap-6">
        <EventCard
          v-for="event in upcomingEvents"
          :key="event.title"
          v-bind="event"
        />
      </div>
      <div class="mt-8 text-center">
        <Link
          href="/events"
          class="inline-flex items-center gap-2 text-sm font-semibold text-[#CE1126] transition-colors hover:text-red-700"
        >
          View All Events
          <ArrowRight class="h-4 w-4" />
        </Link>
      </div>
    </div>
  </section>

  <section class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <SectionHeading
        title="Our Focus Areas"
        subtitle="ICAD serves the Indonesian community through three key pillars."
        centered
      />
      <div class="mt-10 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        <div class="group rounded-xl border bg-white p-8 text-center shadow-sm transition-all hover:-translate-y-1 hover:shadow-lg">
          <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-xl bg-red-50 text-[#CE1126]">
            <Briefcase class="h-7 w-7" />
          </div>
          <h3 class="text-lg font-semibold text-gray-900">Business & Professional</h3>
          <p class="mt-2 text-sm leading-relaxed text-gray-600">
            Networking events, business matching, and professional development for Indonesian entrepreneurs and professionals in the UAE.
          </p>
        </div>
        <div class="group rounded-xl border bg-white p-8 text-center shadow-sm transition-all hover:-translate-y-1 hover:shadow-lg">
          <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-xl bg-red-50 text-[#CE1126]">
            <Users class="h-7 w-7" />
          </div>
          <h3 class="text-lg font-semibold text-gray-900">Community & Culture</h3>
          <p class="mt-2 text-sm leading-relaxed text-gray-600">
            Cultural celebrations, social gatherings, and community welfare programs that keep Indonesian traditions alive abroad.
          </p>
        </div>
        <div class="group rounded-xl border bg-white p-8 text-center shadow-sm transition-all hover:-translate-y-1 hover:shadow-lg">
          <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-xl bg-red-50 text-[#CE1126]">
            <Handshake class="h-7 w-7" />
          </div>
          <h3 class="text-lg font-semibold text-gray-900">Trade & Investment</h3>
          <p class="mt-2 text-sm leading-relaxed text-gray-600">
            Facilitating Indonesia-UAE trade relations, investment opportunities, and bilateral economic cooperation.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-[#CE1126] py-16">
    <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
      <h2 class="text-3xl font-bold text-white">Ready to Join Our Community?</h2>
      <p class="mx-auto mt-4 max-w-2xl text-lg text-red-100">
        Whether you are a professional, entrepreneur, student, or family — there is a place for you at ICAD.
      </p>
      <div class="mt-8 flex flex-wrap justify-center gap-4">
        <Link
          href="/membership"
          class="inline-flex items-center gap-2 rounded-lg bg-white px-6 py-3 text-sm font-semibold text-[#CE1126] transition-all hover:bg-gray-100"
        >
          Become a Member
          <ArrowRight class="h-4 w-4" />
        </Link>
        <Link
          href="/contact"
          class="inline-flex items-center gap-2 rounded-lg border border-white/40 px-6 py-3 text-sm font-semibold text-white transition-all hover:bg-white/10"
        >
          Contact Us
        </Link>
      </div>
    </div>
  </section>
</template>
