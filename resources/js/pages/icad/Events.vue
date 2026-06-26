<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import SectionHeading from '@/components/icad/SectionHeading.vue'
import EventCard from '@/components/icad/EventCard.vue'
import { Calendar, Music, Briefcase, Heart } from '@lucide/vue'

const categories = [
  { name: 'All Events', icon: Calendar, active: true },
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
  },
  {
    title: 'Q3 Business Networking Mixer',
    date: '12 Sep 2026',
    time: '18:30 - 21:00',
    location: 'Downtown Abu Dhabi',
    type: 'Business',
    description: 'Connect with fellow Indonesian professionals, entrepreneurs, and business leaders in Abu Dhabi.',
  },
  {
    title: 'Batik Day Workshop & Fashion Show',
    date: '2 Oct 2026',
    time: '14:00 - 17:00',
    location: 'Cultural Centre, Abu Dhabi',
    type: 'Cultural',
    description: 'Celebrate Batik Day with a workshop on batik history and techniques, followed by a fashion show.',
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

  <section class="bg-gradient-to-br from-gray-900 to-gray-800 py-24">
    <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
      <h1 class="text-4xl font-bold text-white sm:text-5xl">Events</h1>
      <p class="mx-auto mt-4 max-w-2xl text-lg text-gray-300">
        From business networking to cultural celebrations — there is always something happening at ICAD
      </p>
    </div>
  </section>

  <section class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <SectionHeading title="Upcoming Events" />
      <div class="mt-8 grid gap-6">
        <EventCard v-for="event in events" :key="event.title" v-bind="event" />
      </div>
    </div>
  </section>

  <section class="bg-gray-50 py-20">
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
