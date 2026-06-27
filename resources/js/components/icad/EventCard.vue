<script setup lang="ts">
import { computed } from 'vue'
import { Calendar, ExternalLink } from '@lucide/vue'

const props = defineProps<{
  title: string
  date: string
  time: string
  location: string
  type: string
  description: string
  image?: string
  registerLink?: string
}>()

const icsData = computed(() => {
  const [day, month, year] = props.date.replace(/^(\d+)(?:st|nd|rd|th)?\s/, '$1 ').split(/[\s,]+/)
  const months: Record<string, string> = { Jan: '01', Feb: '02', Mar: '03', Apr: '04', May: '05', Jun: '06', Jul: '07', Aug: '08', Sep: '09', Oct: '10', Nov: '11', Dec: '12' }
  const timeParts = props.time.match(/(\d{1,2}):(\d{2})\s*-\s*(\d{1,2}):(\d{2})/)
  if (!timeParts || !months[month]) return ''

  const y = year || '2026'
  const startH = String(parseInt(timeParts[1]) + 4).padStart(2, '0')
  const startM = timeParts[2]
  const endH = String(parseInt(timeParts[3]) + 4).padStart(2, '0')
  const endM = timeParts[4]
  const start = `${y}${months[month]}${String(day).padStart(2, '0')}T${startH}${startM}00`
  const end = `${y}${months[month]}${String(day).padStart(2, '0')}T${endH}${endM}00`

  const ics = [
    'BEGIN:VCALENDAR',
    'VERSION:2.0',
    'PRODID:-//ICAD//Events//EN',
    'BEGIN:VEVENT',
    `DTSTART:${start}`,
    `DTEND:${end}`,
    `SUMMARY:${props.title}`,
    `DESCRIPTION:${props.description.replace(/\n/g, '\\n')}`,
    `LOCATION:${props.location}`,
    'END:VEVENT',
    'END:VCALENDAR',
  ].join('\r\n')

  return 'data:text/calendar;charset=utf-8,' + encodeURIComponent(ics)
})

function downloadIcs() {
  if (!icsData.value) return
  const a = document.createElement('a')
  a.href = icsData.value
  a.download = `${props.title.replace(/\s+/g, '-').toLowerCase()}.ics`
  a.click()
}
</script>

<template>
  <div class="group flex flex-col overflow-hidden rounded-xl border bg-white shadow-sm transition-all hover:shadow-lg sm:flex-row">
    <div class="flex h-48 w-full items-center justify-center bg-gradient-to-br from-[#CE1126] to-red-800 text-white sm:h-auto sm:w-48">
      <div class="text-center">
        <p class="text-3xl font-bold">{{ date.split(' ')[0] }}</p>
        <p class="text-sm">{{ date.split(' ').slice(1).join(' ') }}</p>
      </div>
    </div>
    <div class="flex flex-1 flex-col justify-between p-6">
      <div>
        <div class="mb-2 flex items-center gap-2">
          <span class="rounded-full bg-red-50 px-2.5 py-0.5 text-xs font-medium text-[#CE1126]">{{ type }}</span>
        </div>
        <h3 class="text-lg font-semibold text-gray-900 group-hover:text-[#CE1126]">{{ title }}</h3>
        <p class="mt-2 line-clamp-2 text-sm text-gray-600">{{ description }}</p>
      </div>
      <div class="mt-4 flex flex-wrap items-center gap-4 text-xs text-gray-500">
        <span class="flex items-center gap-1">🕐 {{ time }}</span>
        <span class="flex items-center gap-1">📍 {{ location }}</span>
      </div>
      <div class="mt-4 flex flex-wrap gap-2">
        <button
          @click="downloadIcs"
          class="inline-flex items-center gap-1.5 rounded-lg border px-3 py-1.5 text-xs font-medium text-gray-600 transition-colors hover:border-[#CE1126] hover:text-[#CE1126]"
        >
          <Calendar class="h-3.5 w-3.5" />
          Add to Calendar
        </button>
        <a
          v-if="registerLink"
          :href="registerLink"
          target="_blank"
          rel="noopener noreferrer"
          class="inline-flex items-center gap-1.5 rounded-lg bg-[#CE1126] px-3 py-1.5 text-xs font-medium text-white transition-colors hover:bg-red-700"
        >
          Register
          <ExternalLink class="h-3.5 w-3.5" />
        </a>
      </div>
    </div>
  </div>
</template>
