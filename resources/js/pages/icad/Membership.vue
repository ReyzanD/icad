<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'
import SectionHeading from '@/components/icad/SectionHeading.vue'
import { Check, ArrowRight, Star, Building, Heart } from '@lucide/vue'
import { useReveal } from '@/composables/useReveal'
import PageHero from '@/components/icad/PageHero.vue'

const memberBenefits = [
  'Access to exclusive business networking events',
  'Member directory listing',
  'Priority registration for cultural events',
  'Monthly newsletter with trade and community updates',
  'Discounted rates for partner services',
  'Business referral and matching opportunities',
  'Mentorship program access',
  'Voting rights in ICAD leadership elections',
]

const tiers = [
  {
    name: 'Individual',
    price: '200 AED',
    period: '/year',
    icon: Star,
    features: [
      'All standard benefits',
      'Event invitations',
      'Newsletter subscription',
      'Community access',
    ],
  },
  {
    name: 'Professional',
    price: '500 AED',
    period: '/year',
    icon: Heart,
    popular: true,
    features: [
      'All Individual benefits',
      'Business directory listing',
      'Priority event registration',
      'Business matching service',
      'Mentorship access',
    ],
  },
  {
    name: 'Corporate',
    price: '2,000 AED',
    period: '/year',
    icon: Building,
    features: [
      'Up to 5 member registrations',
      'Premium business directory listing',
      'Sponsored content opportunities',
      'Exclusive B2B networking',
      'Partnership badge',
      'Event sponsorship options',
    ],
  },
]

const memberList = [
  { name: 'PT Garuda Services UAE', rep: 'Arief Hidayat', type: 'Corporate' },
  { name: 'Batik Nusantara Gallery', rep: 'Sari Dewi', type: 'Business' },
  { name: 'Nusantara Restaurant Group', rep: 'Rudi Hermawan', type: 'Corporate' },
  { name: 'IndoTech Solutions', rep: 'Dian Pertiwi', type: 'Professional' },
  { name: 'Bumi Travel & Tours', rep: 'Agus Wibowo', type: 'Business' },
  { name: 'Cahaya Accounting & Tax', rep: 'Maya Indah', type: 'Professional' },
  { name: 'Rempah Ratus Catering', rep: 'Ibu Sari', type: 'Individual' },
  { name: 'Archipelago Arts Studio', rep: 'Putra Nusantara', type: 'Individual' },
]

const { target: benefitsEl, isRevealed: benefitsRevealed } = useReveal()
const { target: plansEl, isRevealed: plansRevealed } = useReveal()
const { target: directoryEl, isRevealed: directoryRevealed } = useReveal()
</script>

<template>
  <Head title="Membership" />

  <PageHero
    title="Membership"
    subtitle="Join ICAD and become part of the premier Indonesian community in Abu Dhabi"
  />

  <section ref="benefitsEl" class="bg-white py-20" :class="{ revealed: benefitsRevealed }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <SectionHeading
        title="Why Join ICAD?"
        subtitle="Membership opens doors to opportunities, connections, and community."
      />
      <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div
          v-for="benefit in memberBenefits"
          :key="benefit"
          class="flex items-start gap-3 rounded-lg border p-4"
        >
          <Check class="mt-0.5 h-5 w-5 shrink-0 text-[#CE1126]" />
          <span class="text-sm text-gray-700">{{ benefit }}</span>
        </div>
      </div>
    </div>
  </section>

  <section ref="plansEl" class="bg-gray-50 py-20" :class="{ revealed: plansRevealed }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <SectionHeading title="Choose Your Membership Plan" centered />
      <div class="mt-10 grid gap-8 lg:grid-cols-3">
        <div
          v-for="tier in tiers"
          :key="tier.name"
          class="relative rounded-xl border bg-white p-8 shadow-sm transition-all hover:shadow-lg"
          :class="{ 'border-[#CE1126] ring-2 ring-[#CE1126]/20': tier.popular }"
        >
          <div v-if="tier.popular" class="absolute -top-3 left-1/2 -translate-x-1/2">
            <span class="rounded-full bg-[#CE1126] px-4 py-1 text-xs font-semibold text-white">Popular</span>
          </div>
          <component :is="tier.icon" class="mb-4 h-8 w-8 text-[#CE1126]" />
          <h3 class="text-xl font-bold text-gray-900">{{ tier.name }}</h3>
          <p class="mt-2">
            <span class="text-3xl font-bold text-gray-900">{{ tier.price }}</span>
            <span class="text-sm text-gray-500">{{ tier.period }}</span>
          </p>
          <ul class="mt-6 space-y-3">
            <li
              v-for="feature in tier.features"
              :key="feature"
              class="flex items-start gap-2 text-sm text-gray-600"
            >
              <Check class="mt-0.5 h-4 w-4 shrink-0 text-green-500" />
              {{ feature }}
            </li>
          </ul>
          <Link
            href="/contact"
            class="mt-8 flex w-full items-center justify-center gap-2 rounded-lg border bg-white px-6 py-3 text-sm font-semibold text-gray-900 transition-all hover:bg-gray-50"
            :class="{ 'bg-[#CE1126] text-white hover:bg-red-700': tier.popular }"
          >
            Join Now
            <ArrowRight class="h-4 w-4" />
          </Link>
        </div>
      </div>
    </div>
  </section>

  <section ref="directoryEl" class="bg-white py-20" :class="{ revealed: directoryRevealed }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <SectionHeading title="Member Directory" subtitle="Meet our community of professionals and businesses." />
      <div class="overflow-hidden rounded-xl border">
        <table class="w-full text-left text-sm">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 font-semibold text-gray-900">Organization / Name</th>
              <th class="px-6 py-3 font-semibold text-gray-900">Representative</th>
              <th class="px-6 py-3 font-semibold text-gray-900">Type</th>
            </tr>
          </thead>
          <tbody class="divide-y">
            <tr v-for="member in memberList" :key="member.name" class="hover:bg-gray-50">
              <td class="px-6 py-4 font-medium text-gray-900">{{ member.name }}</td>
              <td class="px-6 py-4 text-gray-600">{{ member.rep }}</td>
              <td class="px-6 py-4">
                <span
                  class="rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-700"
                  :class="{
                    'bg-blue-50 text-blue-700': member.type === 'Corporate',
                    'bg-green-50 text-green-700': member.type === 'Business',
                    'bg-purple-50 text-purple-700': member.type === 'Professional',
                    'bg-gray-100 text-gray-700': member.type === 'Individual',
                  }"
                >
                  {{ member.type }}
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</template>
