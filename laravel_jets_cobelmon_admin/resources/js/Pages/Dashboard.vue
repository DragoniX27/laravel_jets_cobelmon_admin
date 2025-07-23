<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-2xl text-white leading-tight text-center">
                Panel Principal
            </h2>
        </template>

        <div class="py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <template v-if="$page.props.auth">
                        <div
                            class="bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-xl shadow-lg hover:scale-105 transition transform cursor-pointer border border-gray-700 hover:border-indigo-500 flex items-center justify-between gap-6"
                        >
                            <div class="flex items-center gap-4 flex-shrink-0">
                                <img :src="$page.props.globalUrl + '/imgs/libreria.webp'" alt="Guías" class="w-20 h-20 object-contain" />
                                <h3 class="text-xl font-semibold text-white">Guías</h3>
                            </div>
                            <p class="text-sm text-gray-300 text-left max-w-md">
                                {{ $page.props.is_admin }}
                            </p>
                        </div>
                    </template>
                    <div
                        class="bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-xl shadow-lg hover:scale-105 transition transform cursor-pointer border border-gray-700 hover:border-indigo-500 flex items-center justify-between gap-6"
                    >
                        <div class="flex items-center gap-4 flex-shrink-0">
                            <img :src="$page.props.globalUrl + '/imgs/libreria.webp'" alt="Guías" class="w-20 h-20 object-contain" />
                            <h3 class="text-xl font-semibold text-white">Guías</h3>
                        </div>
                        <p class="text-sm text-gray-300 text-left max-w-md">
                            Aquí encontrarás una guía con todo lo que necesitas saber sobre el servidor.
                        </p>
                    </div>
                    <div
                        class="bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-xl shadow-lg hover:scale-105 transition transform cursor-pointer border border-gray-700 hover:border-indigo-500 flex items-center justify-between gap-6"
                    >
                        <div class="flex items-center gap-4 flex-shrink-0">
                            <img :src="$page.props.globalUrl + '/imgs/perfil.webp'" alt="Guías" class="w-20 h-20 object-contain" />
                            <h3 class="text-xl font-semibold text-white">Perfil</h3>
                        </div>
                        <p class="text-sm text-gray-300 text-left max-w-md">
                            Configura tu perfil, sube la Skin que quieras para verla en el servidor
                        </p>
                    </div>
                    <div
                        class="bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-xl shadow-lg hover:scale-105 transition transform cursor-pointer border border-gray-700 hover:border-indigo-500 flex items-center justify-between gap-6"
                    >
                        <div class="flex items-center gap-4 flex-shrink-0">
                            <img :src="$page.props.globalUrl + '/imgs/players.webp'" alt="Guías" class="w-20 h-20 object-contain" />
                            <h3 class="text-xl font-semibold text-white">Jugadores</h3>
                        </div>
                        <p class="text-sm text-gray-300 text-left max-w-md">
                            Mira un resumen de todos los jugadres del servidor
                        </p>
                    </div>
                    <div
                        class="bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-xl shadow-lg hover:scale-105 transition transform cursor-pointer border border-gray-700 hover:border-indigo-500 flex items-center justify-between gap-6"
                    >
                        <div class="flex items-center gap-4 flex-shrink-0">
                            <img :src="$page.props.globalUrl + '/imgs/gacha.webp'" alt="Guías" class="w-20 h-20 object-contain" />
                            <h3 class="text-xl font-semibold text-white">Gacha</h3>
                        </div>
                        <p class="text-sm text-gray-300 text-left max-w-md">
                            Tira tu suerte tirando a por pokemons aleatorios gastando tus tiros (maldito ludopata)
                        </p>
                    </div>
                    <div
                        class="bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-xl shadow-lg hover:scale-105 transition transform cursor-pointer border border-gray-700 hover:border-indigo-500 flex items-center justify-between gap-6"
                    >
                        <div class="flex items-center gap-4 flex-shrink-0">
                            <img :src="$page.props.globalUrl + '/imgs/tikets.webp'" alt="Guías" class="w-20 h-20 object-contain" />
                            <h3 class="text-xl font-semibold text-white">Tikets</h3>
                        </div>
                        <p class="text-sm text-gray-300 text-left max-w-md">
                            Tienes alguna duda, error o sugerencia con el servidor, monta un tiket y lo resolveremos (o no)
                        </p>
                    </div>
                    <div
                        class="bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-xl shadow-lg hover:scale-105 transition transform cursor-pointer border border-gray-700 hover:border-indigo-500 flex items-center justify-between gap-6"
                    >
                        <div class="flex items-center gap-4 flex-shrink-0">
                            <img :src="$page.props.globalUrl + '/imgs/codes.webp'" alt="Guías" class="w-20 h-20 object-contain" />
                            <h3 class="text-xl font-semibold text-white">Codigos</h3>
                        </div>
                        <p class="text-sm text-gray-300 text-left max-w-md">
                            Canjea codigos para obtener un premio, aunque estan ocultos
                        </p>
                    </div>
                    <div
                        class="bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-xl shadow-lg hover:scale-105 transition transform cursor-pointer border border-gray-700 hover:border-indigo-500 flex items-center justify-between gap-6"
                    >
                        <div class="flex items-center gap-4 flex-shrink-0">
                            <img :src="$page.props.globalUrl + '/imgs/events.png'" alt="Guías" class="w-20 h-20 object-contain" />
                            <h3 class="text-xl font-semibold text-white">Misiones</h3>
                        </div>
                        <p class="text-sm text-gray-300 text-left max-w-md">
                            Mira las misiones acitvas del servidor para ver como completarlas y ganar recompensas
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
