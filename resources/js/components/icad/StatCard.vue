<script setup lang="ts">
defineProps<{
  number: string
  label: string
}>()
</script>

<template>
  <div class="rounded-xl border bg-white p-6 text-center shadow-sm transition-shadow hover:shadow-md">
    <p class="text-4xl font-bold text-[#CE1126]">{{ number }}</p>
    <p class="mt-2 text-sm font-medium text-gray-600">{{ label }}</p>
  </div>
</template>
