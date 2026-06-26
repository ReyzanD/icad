<script setup lang="ts">
defineProps<{
  title: string
  date: string
  time: string
  location: string
  type: string
  description: string
  image?: string
}>()
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
      <div class="mt-4 flex items-center gap-4 text-xs text-gray-500">
        <span class="flex items-center gap-1">🕐 {{ time }}</span>
        <span class="flex items-center gap-1">📍 {{ location }}</span>
      </div>
    </div>
  </div>
</template>
