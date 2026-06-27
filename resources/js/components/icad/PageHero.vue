<script setup lang="ts">
defineProps<{
  title: string
  subtitle?: string
}>()
</script>

<template>
  <section class="relative overflow-hidden bg-gradient-to-br from-gray-900 via-gray-800 to-[#CE1126]/20 py-24 sm:py-32">
    <div class="absolute inset-0 opacity-[0.03]"
      style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23fff' fill-opacity='0.4'%3E%3Cpath d='M36 34v-2H24v2h12zm0-10v-2H24v2h12z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E&quot;)">
    </div>
    <div class="absolute -top-24 -right-24 h-64 w-64 rounded-full bg-[#CE1126]/10 blur-3xl"></div>
    <div class="absolute -bottom-32 -left-32 h-80 w-80 rounded-full bg-[#D4A84B]/5 blur-3xl"></div>
    <div class="relative mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
      <div class="inline-block rounded-full bg-white/10 px-4 py-1.5 text-xs font-medium text-white/80 backdrop-blur-sm mb-4">
        ICAD
      </div>
      <h1 class="text-4xl font-bold text-white sm:text-5xl lg:text-6xl">{{ title }}</h1>
      <p v-if="subtitle" class="mx-auto mt-4 max-w-2xl text-lg text-gray-300">
        {{ subtitle }}
      </p>
    </div>
  </section>
</template>
