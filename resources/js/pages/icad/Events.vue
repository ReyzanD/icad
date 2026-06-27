<script setup lang="ts">
import { ref, computed } from 'vue'
import { Head } from '@inertiajs/vue3'
import SectionHeading from '@/components/icad/SectionHeading.vue'
import EventCard from '@/components/icad/EventCard.vue'
import { Calendar, Music, Briefcase, Heart } from '@lucide/vue'
import { useReveal } from '@/composables/useReveal'
import PageHero from '@/components/icad/PageHero.vue'

const activeCategory = ref('All Events')

const { target: eventsEl, isRevealed: eventsRevealed } = useReveal()
const { target: pastEl, isRevealed: pastRevealed } = useReveal()

const categories = [
  { name: 'All Events', icon: Calendar },
  { name: 'Business', icon: Briefcase },
  { name: 'Cultural', icon: Music },
  { name: 'Community', icon: Heart },
]

const events = [
  {
    title: 'Indonesian Independence Day Celebration',
    date: '17 Aug 2026',
    time: '10:00 - 18:00',
    location: 'Abu Dhabi Corniche',
    type: 'Cultural',
    description: 'A grand celebration featuring traditional performances, flag ceremony, culinary fair, and family activities.',
    registerLink: 'https://forms.google.com/independence-day-2026',
  },
  {
    title: 'Q3 Business Networking Mixer',
    date: '12 Sep 2026',
    time: '18:30 - 21:00',
    location: 'Downtown Abu Dhabi',
    type: 'Business',
    description: 'Connect with fellow Indonesian professionals, entrepreneurs, and business leaders in Abu Dhabi.',
    registerLink: 'https://forms.google.com/q3-networking-2026',
  },
  {
    title: 'Batik Day Workshop & Fashion Show',
    date: '2 Oct 2026',
    time: '14:00 - 17:00',
    location: 'Cultural Centre, Abu Dhabi',
    type: 'Cultural',
    description: 'Celebrate Batik Day with a workshop on batik history and techniques, followed by a fashion show.',
    registerLink: 'https://forms.google.com/batik-day-2026',
  },
  {
    title: 'Eid Al-Fitr Gathering',
    date: 'TBC Mar 2026',
    time: '18:00 - 22:00',
    location: 'Abu Dhabi',
    type: 'Community',
    description: 'A warm community gathering to celebrate Eid Al-Fitr together with traditional Indonesian dishes.',
  },
  {
    title: 'Indonesia-UAE Trade Forum',
    date: '18 Nov 2026',
    time: '09:00 - 16:00',
    location: 'Abu Dhabi Chamber of Commerce',
    type: 'Business',
    description: 'A forum exploring trade and investment opportunities between Indonesia and the UAE.',
    registerLink: 'https://forms.google.com/trade-forum-2026',
  },
  {
    title: 'Year-End Community Gala',
    date: '12 Dec 2026',
    time: '19:00 - 23:00',
    location: 'Abu Dhabi',
    type: 'Community',
    description: 'Annual gala dinner celebrating the community with performances, awards, and cultural showcases.',
  },
]

const filteredEvents = computed(() =>
  activeCategory.value === 'All Events'
    ? events
    : events.filter(e => e.type === activeCategory.value)
)

const pastEvents = [
  {
    title: 'Ramadan Iftar Gathering',
    date: 'Mar 2025',
    time: '18:00 - 21:00',
    location: 'Abu Dhabi',
    type: 'Community',
    description: 'A community iftar gathering during Ramadan.',
  },
  {
    title: 'Indonesia Investment Seminar',
    date: 'Feb 2025',
    time: '10:00 - 14:00',
    location: 'Abu Dhabi',
    type: 'Business',
    description: 'Seminar on investment opportunities in Indonesia\'s growing economy.',
  },
  {
    title: 'Wayang Kulit Performance',
    date: 'Nov 2024',
    time: '19:00 - 21:00',
    location: 'Cultural Centre, Abu Dhabi',
    type: 'Cultural',
    description: 'Traditional Indonesian shadow puppet performance.',
  },
]
</script>

<template>
  <Head title="Events" />

  <PageHero
    title="Events"
    subtitle="From business networking to cultural celebrations — there is always something happening at ICAD"
  />

  <div class="relative z-10 mx-auto -mt-12 mb-12 flex max-w-7xl justify-end px-4 sm:px-6 lg:px-8">
    <div class="flex items-center gap-2 rounded-lg border bg-white px-4 py-2 shadow-sm">
      <Calendar class="h-4 w-4 text-[#CE1126]" />
      <span class="text-sm text-gray-600">Upcoming events listed below</span>
    </div>
  </div>

  <section ref="eventsEl" class="bg-white py-20" :class="{ revealed: eventsRevealed }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <SectionHeading title="Upcoming Events" />
      <div class="mb-8 flex flex-wrap items-center gap-2">
        <button
          v-for="(cat, index) in categories"
          :key="cat.name"
          @click="activeCategory = cat.name"
          class="inline-flex items-center gap-2 rounded-full border px-4 py-1.5 text-sm font-medium transition-colors"
          :class="[
            activeCategory === cat.name
              ? 'bg-[#CE1126] text-white border-[#CE1126]'
              : 'text-gray-700 hover:bg-gray-100',
            'reveal-delay-' + (index + 1)
          ]"
        >
          <component :is="cat.icon" class="h-4 w-4" />
          {{ cat.name }}
        </button>
      </div>
      <div class="mt-8 grid gap-6">
        <EventCard v-for="event in filteredEvents" :key="event.title" v-bind="event" />
      </div>
    </div>
  </section>

  <section ref="pastEl" class="bg-gray-50 py-20" :class="{ revealed: pastRevealed }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <SectionHeading title="Past Events" subtitle="Highlights from our recent community activities." />
      <div class="mt-8 grid gap-6">
        <EventCard
          v-for="event in pastEvents"
          :key="event.title"
          v-bind="event"
        />
      </div>
    </div>
  </section>
</template>
