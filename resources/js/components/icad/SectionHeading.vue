<script setup lang="ts">
defineProps<{
  title: string
  subtitle?: string
  centered?: boolean
}>()
</script>

<template>
  <div :class="['mb-10', centered ? 'text-center' : '']">
    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ title }}</h2>
    <p v-if="subtitle" class="mt-4 text-lg leading-relaxed text-gray-600" :class="centered ? 'mx-auto max-w-2xl' : ''">
      {{ subtitle }}
    </p>
  </div>
</template>
