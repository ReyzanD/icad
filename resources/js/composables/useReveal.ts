import { ref, watch } from 'vue'
import { useElementVisibility } from '@vueuse/core'

export function useReveal({ threshold = 0.15 } = {}) {
  const target = ref<HTMLElement | null>(null)
  const isVisible = useElementVisibility(target, { threshold })
  const isRevealed = ref(false)

  watch(isVisible, (val) => {
    if (val) isRevealed.value = true
  })

  return { target, isRevealed }
}
