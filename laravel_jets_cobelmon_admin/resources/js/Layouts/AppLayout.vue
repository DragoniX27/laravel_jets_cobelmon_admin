<script>
import { ref, onMounted, defineComponent } from 'vue';
import { Head} from '@inertiajs/vue3';
import Banner from '@/Components/Banner.vue';
import Navbar from '@/Components/Navbar.vue';
import Loading from 'vue-loading-overlay';
import loadingState from '@/loadingState.js';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

export default defineComponent({
    setup(){
        const page = usePage();
        onMounted(() => {
            if (page.props.flash.message) {
                toast(page.props.flash.message, { type: page.props.flash.status, "autoClose": 3000});
            }
        });
    },
    components: {
        ref,
        Head,
        Banner,
        Loading,
        Navbar
    },
    computed: {
        loadingState() {
            return loadingState;
        }
    },
    props:{
        title: String,
    },
})
</script>

<template>
    <div class="min-h-screen bg-gradient-to-br from-gray-900 to-black text-white">
        <Head :title="title" />

        <!-- Navbar y banner -->
        <Navbar />
        <Banner />

        <!-- Encabezado de la página -->
        <header v-if="$slots.header" class="bg-gray-800 border-b border-gray-700 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <slot name="header" />
            </div>
        </header>
        <loading :active.sync="loadingState.isLoading" :is-full-page="true" :lock-scroll="true"/>
        <!-- Contenido principal -->
        <main class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-10">
            <slot />
        </main>
    </div>
</template>
