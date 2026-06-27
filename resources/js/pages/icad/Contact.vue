<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import SectionHeading from '@/components/icad/SectionHeading.vue'
import { MapPin, Phone, Mail, Clock, Send } from '@lucide/vue'
import { useReveal } from '@/composables/useReveal'
import PageHero from '@/components/icad/PageHero.vue'

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

const { target: infoEl, isRevealed: infoRevealed } = useReveal()
const { target: formEl, isRevealed: formRevealed } = useReveal()
const { target: mapEl, isRevealed: mapRevealed } = useReveal()
</script>

<template>
  <Head title="Contact" />

  <PageHero
    title="Contact Us"
    subtitle="We would love to hear from you. Get in touch with ICAD."
  />

  <section ref="infoEl" class="bg-white py-20" :class="{ revealed: infoRevealed }">
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
                href="https://www.instagram.com/"
                target="_blank"
                rel="noopener noreferrer"
                class="flex h-10 w-10 items-center justify-center rounded-lg border bg-white text-gray-600 transition-colors hover:border-[#CE1126] hover:text-[#CE1126]"
                title="Instagram"
              >
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
                  <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                  <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
                </svg>
              </a>
              <a
                href="https://www.facebook.com/"
                target="_blank"
                rel="noopener noreferrer"
                class="flex h-10 w-10 items-center justify-center rounded-lg border bg-white text-gray-600 transition-colors hover:border-[#CE1126] hover:text-[#CE1126]"
                title="Facebook"
              >
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                </svg>
              </a>
              <a
                href="https://www.linkedin.com/"
                target="_blank"
                rel="noopener noreferrer"
                class="flex h-10 w-10 items-center justify-center rounded-lg border bg-white text-gray-600 transition-colors hover:border-[#CE1126] hover:text-[#CE1126]"
                title="LinkedIn"
              >
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                  <rect width="4" height="12" x="2" y="9"/>
                  <circle cx="4" cy="4" r="2"/>
                </svg>
              </a>
              <a
                href="https://www.youtube.com/"
                target="_blank"
                rel="noopener noreferrer"
                class="flex h-10 w-10 items-center justify-center rounded-lg border bg-white text-gray-600 transition-colors hover:border-[#CE1126] hover:text-[#CE1126]"
                title="YouTube"
              >
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.94 2C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/>
                  <polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/>
                </svg>
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

  <section ref="mapEl" class="h-96 w-full" :class="{ revealed: mapRevealed }">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116121.11970873115!2d54.28514418671875!3d24.4763883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5e440f7234f8f7%3A0x7b1c3b8b8b8b8b8b!2sAbu%20Dhabi%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2sae!4v1"
      width="100%"
      height="100%"
      style="border:0"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
      title="ICAD Location - Abu Dhabi, UAE"
    ></iframe>
  </section>
</template>
