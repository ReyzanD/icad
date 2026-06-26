<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import SectionHeading from '@/components/icad/SectionHeading.vue'
import { MapPin, Phone, Mail, Clock, Send } from '@lucide/vue'

const contactInfo = [
  {
    icon: MapPin,
    label: 'Address',
    value: 'Abu Dhabi, United Arab Emirates',
  },
  {
    icon: Phone,
    label: 'Phone',
    value: '+971 2 XXX XXXX',
  },
  {
    icon: Mail,
    label: 'Email',
    value: 'info@icad.ae',
  },
  {
    icon: Clock,
    label: 'Office Hours',
    value: 'Sunday — Thursday, 9:00 AM — 5:00 PM',
  },
]

const formFields = [
  { name: 'name', label: 'Full Name', type: 'text' },
  { name: 'email', label: 'Email Address', type: 'email' },
  { name: 'subject', label: 'Subject', type: 'text' },
]
</script>

<template>
  <Head title="Contact" />

  <section class="bg-gradient-to-br from-gray-900 to-gray-800 py-24">
    <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
      <h1 class="text-4xl font-bold text-white sm:text-5xl">Contact Us</h1>
      <p class="mx-auto mt-4 max-w-2xl text-lg text-gray-300">
        We would love to hear from you. Get in touch with ICAD.
      </p>
    </div>
  </section>

  <section class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-12 lg:grid-cols-2">
        <div>
          <SectionHeading title="Get in Touch" subtitle="Have a question, suggestion, or want to collaborate? Reach out to us." />

          <div class="mt-8 space-y-6">
            <div
              v-for="item in contactInfo"
              :key="item.label"
              class="flex items-start gap-4"
            >
              <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-red-50 text-[#CE1126]">
                <component :is="item.icon" class="h-5 w-5" />
              </div>
              <div>
                <p class="text-sm font-medium text-gray-900">{{ item.label }}</p>
                <p class="text-sm text-gray-600">{{ item.value }}</p>
              </div>
            </div>
          </div>

          <div class="mt-8 rounded-xl border bg-gray-50 p-6">
            <p class="text-sm font-semibold text-gray-900">Follow us on social media</p>
            <div class="mt-4 flex gap-3">
              <a
                v-for="social in ['Instagram', 'Facebook', 'LinkedIn', 'YouTube']"
                :key="social"
                href="#"
                class="rounded-lg border bg-white px-4 py-2 text-sm text-gray-700 transition-colors hover:border-[#CE1126] hover:text-[#CE1126]"
              >
                {{ social }}
              </a>
            </div>
          </div>
        </div>

        <div class="rounded-xl border bg-white p-8 shadow-sm">
          <h3 class="text-lg font-semibold text-gray-900">Send us a message</h3>
          <p class="mt-1 text-sm text-gray-600">
            We will get back to you as soon as possible.
          </p>
          <form class="mt-6 space-y-4" @submit.prevent>
            <div v-for="field in formFields" :key="field.name">
              <label :for="field.name" class="block text-sm font-medium text-gray-700">{{ field.label }}</label>
              <input
                :id="field.name"
                :name="field.name"
                :type="field.type"
                class="mt-1 block w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 transition-colors focus:border-[#CE1126] focus:outline-none focus:ring-2 focus:ring-[#CE1126]/20"
                :placeholder="`Your ${field.label.toLowerCase()}`"
              />
            </div>
            <div>
              <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
              <textarea
                id="message"
                name="message"
                rows="5"
                class="mt-1 block w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 transition-colors focus:border-[#CE1126] focus:outline-none focus:ring-2 focus:ring-[#CE1126]/20"
                placeholder="Your message"
              ></textarea>
            </div>
            <button
              type="submit"
              class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-[#CE1126] px-6 py-3 text-sm font-semibold text-white transition-all hover:bg-red-700"
            >
              Send Message
              <Send class="h-4 w-4" />
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="h-80 w-full bg-gray-200">
    <div class="flex h-full items-center justify-center bg-gray-100 text-gray-500">
      <div class="text-center">
        <MapPin class="mx-auto h-8 w-8" />
        <p class="mt-2 text-sm font-medium">Map Placeholder — Abu Dhabi, UAE</p>
        <p class="text-xs text-gray-400">Interactive map will be embedded here</p>
      </div>
    </div>
  </section>
</template>
