<template>
    <div>
        <label class="block mb-1 text-sm font-medium">{{ label }}</label>

        <v-select v-model="selected" :options="options" label="label" :filterable="false"
            :loading="loading" @search="handleSearch" @open="onOpen" class="custom-select">
            <!-- Opción en el dropdown -->
            <template #option="{ label, sprite }">
                <div class="flex items-center gap-2 text-black">
                    <img v-if="sprite" :src="sprite" class="w-15 h-15" />
                    <span>{{ label }}</span>
                </div>
            </template>
            <template #selected-option="{ label, sprite }">
                <div class="flex items-center gap-2">
                    <img v-if="sprite" :src="sprite" class="w-5 h-5" />
                    <span>{{ label }}</span>
                </div>
            </template>
            <template #list-footer>
                <div v-if="hasMore" class="p-2 text-center">
                    <button type="button" class="text-indigo-400 hover:text-indigo-300 text-sm" @click.stop="loadMore"
                        :disabled="loading">
                        {{ loading ? 'Cargando...' : 'Cargar más' }}
                    </button>
                </div>
            </template>
        </v-select>

        <p v-if="error" class="mt-1 text-sm text-red-500">{{ error }}</p>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue'
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css'
import axios from 'axios'
import debounce from 'lodash/debounce'

const props = defineProps({
    modelValue: [String, Number, null],
    label: { type: String, default: 'Pokémon' },
    error: { type: String, default: '' },
})

const emit = defineEmits(['update:modelValue'])

const selected = ref(props.modelValue ?? null)
const options = ref([])
const search = ref('')
const page = ref(1)
const hasMore = ref(false)
const loading = ref(false)

// Sincroniza el v-model hacia afuera
watch(selected, (val) => emit('update:modelValue', val))

// Si cambian el modelValue desde afuera
watch(() => props.modelValue, (val) => {
    selected.value = val
})

const fetchData = async (reset = false) => {
    try {
        loading.value = true
        const { data } = await axios.post(route('minecraft.pokemon.search'), {
            q: search.value,
            page: page.value
        })

        if (reset) {
            options.value = data.data
        } else {
            options.value = [...options.value, ...data.data]
        }

        hasMore.value = data.has_more
        ensureSelectedInOptions()
    } finally {
        loading.value = false
    }
}

const handleSearch = debounce((term) => {
    search.value = term
    page.value = 1
    fetchData(true)
}, 300)

const loadMore = () => {
    if (!hasMore.value || loading.value) return
    page.value++
    fetchData(false)
}

const onOpen = () => {
    if (options.value.length === 0) {
        page.value = 1
        fetchData(true)
    }
}

const ensureSelectedInOptions = () => {
    if (selected.value && !options.value.find(o => o.code === selected.value)) {
        axios.post(route('minecraft.pokemon.search'), { q: selected.value })
            .then(({ data }) => {
                const found = data.data.find(p => p.code === selected.value)
                if (found) {
                    options.value.unshift(found) // Lo añadimos al inicio
                }
            })
            .catch(() => {})
    }
}
</script>

<style scoped>
.custom-select {
  @apply w-full bg-gray-900 rounded-lg border border-gray-700 text-white;
}
.custom-select .vs__dropdown-toggle {
  @apply bg-gray-900 border-none text-white;
}
.custom-select .vs__dropdown-menu {
  @apply bg-gray-900 text-white border border-gray-700;
}
.custom-select .vs__selected {
  @apply text-white;
}
</style>
