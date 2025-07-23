<script>
import NavLink from '@/Components/NavLink.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link, router } from '@inertiajs/vue3';
import { defineComponent } from 'vue';

export default defineComponent({
    name: 'Navbar',
    components: {
        NavLink,
        Dropdown,
        DropdownLink,
        ResponsiveNavLink,
        Link,
        router
    },
    data() {
        return {
            showingNavigationDropdown: false,
        };
    },
    methods: {
        logout() {
            router.post(route('logout'));
        },
        switchToTeam(team) {
            router.put(route('current-team.update'), { team_id: team.id });
        }
    }
});
</script>

<template>
    <nav class="bg-gray-900 text-white border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center space-x-8">
                    <!-- Logo -->
                    <Link :href="route('dashboard')" class="flex items-center">
                        <img src="https://cdn2.steamgriddb.com/icon_thumb/5cc8dfeade12d0c5cd741edb9ae24d81.png"
                            alt="Cobble Land Logo" class="w-10 object-contain" />
                    </Link>

                    <!-- Navigation Links -->
                    <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                        Dashboard
                    </NavLink>
                </div>

                <!-- Right Side -->
                <div class="hidden sm:flex sm:items-center space-x-4">
                    <!-- Teams -->
                    <Dropdown v-if="$page.props.jetstream.hasTeamFeatures" align="right" width="60">
                        <template #trigger>
                            <button class="px-3 py-2 rounded-md bg-gray-800 hover:bg-gray-700 text-sm">
                                {{ $page.props.auth.user.name }}
                                <svg class="inline ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </template>
                    </Dropdown>

                    <!-- User -->
                    <Dropdown align="right" width="48">
                        <template #trigger>
                            <button class="flex items-center text-sm rounded-full focus:outline-none">
                                <img v-if="$page.props.jetstream.managesProfilePhotos" class="h-8 w-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name" />
                                <span v-else class="ml-2">{{ $page.props.auth.user.name }}</span>
                            </button>
                        </template>
                        <template #content>
                            <div class="px-4 py-2 text-xs text-gray-300">Manage Account</div>
                            <DropdownLink :href="route('profile.show')">Profile</DropdownLink>
                            <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">API Tokens</DropdownLink>
                            <div class="border-t border-gray-700" />
                        </template>
                    </Dropdown>
                    <form @submit.prevent="logout">
                        <DropdownLink as="button">Log Out</DropdownLink>
                    </form>
                </div>

                <!-- Mobile Hamburger -->
                <div class="flex items-center sm:hidden">
                    <button @click="showingNavigationDropdown = !showingNavigationDropdown" class="p-2 rounded-md text-gray-400 hover:bg-gray-800">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path v-if="!showingNavigationDropdown" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div v-show="showingNavigationDropdown" class="sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">Dashboard</ResponsiveNavLink>
            </div>
            <div class="pt-4 pb-1 border-t border-gray-800">
                <div class="flex items-center px-4">
                    <div v-if="$page.props.jetstream.managesProfilePhotos">
                        <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name" />
                    </div>
                    <div class="ml-3">
                        <div class="text-base text-white">{{ $page.props.auth.user.name }}</div>
                        <div class="text-sm text-gray-400">{{ $page.props.auth.user.email }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    <ResponsiveNavLink :href="route('profile.show')">Profile</ResponsiveNavLink>
                    <ResponsiveNavLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">API Tokens</ResponsiveNavLink>
                    <form method="POST" @submit.prevent="logout">
                        <ResponsiveNavLink as="button">Log Out</ResponsiveNavLink>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</template>