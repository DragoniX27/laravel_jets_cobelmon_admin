<script setup>
import { ref } from 'vue'
import { Head, useForm } from '@inertiajs/vue3'
import { toast } from 'vue3-toastify'
import 'vue3-toastify/dist/index.css'
import PokemonSelect from '@/Components/PokemonSelect.vue'

const form = useForm({
    username: '',
    email: '',
    password: '',
    phone: '',
    favorite_pokemon: '',
    second_favorite_pokemon: '',
    lvl_minecraft: '',
    lvl_pokemon: '',
    reason: ''
})

const submit = () => {
    form.post(route('minecraft.register.post'), {
        onSuccess: () => {
            toast("Registro exitoso", { type: 'success' });
        },
        onError: () => {
            toast("Ocurrió un error en el registro", { type: 'error' });
        }
    })
}

</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 to-black text-white px-4">

        <Head title="Registro" />

        <div class="w-full max-w-2xl bg-gray-800 p-8 rounded-2xl shadow-lg border border-gray-700">
            <h2 class="text-2xl font-bold mb-6 text-center">Registro de Entrenador Minecraft ChirriMon </h2>

            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block mb-1 text-sm font-medium">Minecraft User Name</label>
                    <small>*pon el nombre exacto de tu perfil de minecraft</small>
                    <input v-model="form.username" type="text"
                        class="w-full p-2 bg-gray-900 rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        name="mincraf_username"
                        required />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Email</label>
                    <input v-model="form.email" type="email"
                        class="w-full p-2 bg-gray-900 rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Contraseña</label>
                    <input v-model="form.password" type="password"
                        class="w-full p-2 bg-gray-900 rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Teléfono</label>
                    <input v-model="form.phone" type="tel"
                        class="w-full p-2 bg-gray-900 rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>

                <PokemonSelect v-model="form.favorite_pokemon" label="Pokémon favorito"
                    :error="form.errors.favorite_pokemon" />

                <PokemonSelect v-model="form.second_favorite_pokemon" label="Segundo Pokémon favorito"
                    :error="form.errors.second_favorite_pokemon" />

                <div>
                    <label class="block mb-1 text-sm font-medium">¿Por qué te gustan esos Pokémon?</label>
                    <textarea v-model="form.reason" rows="3"
                        class="w-full p-2 bg-gray-900 rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                </div>
                
                <div>
                    <label class="block mb-1 text-sm font-medium">Que tanto sabes de Minecraft?</label>
                    <select v-model="form.lvl_minecraft"
                        class="w-full p-2 bg-gray-900 rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option disabled value="">Seleccione su nivel</option>
                        <option value="Noob">Noob</option>
                        <option value="Manco">Manco</option>
                        <option value="Normal">Normal</option>
                        <option value="Pro">Pro</option>
                    </select>
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Que tanto sabes de Pokemon?</label>
                    <select v-model="form.lvl_pokemon"
                        class="w-full p-2 bg-gray-900 rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option disabled value="">Seleccione su nivel</option>
                        <option value="Noob">Noob</option>
                        <option value="Manco">Manco</option>
                        <option value="Normal">Normal</option>
                        <option value="Pro">Pro</option>
                    </select>
                </div>


                <button type="submit"
                    class="w-full mt-4 bg-indigo-600 hover:bg-indigo-700 py-2 px-4 rounded-lg font-semibold">
                    Registrarse
                </button>
            </form>
        </div>
    </div>
</template>
