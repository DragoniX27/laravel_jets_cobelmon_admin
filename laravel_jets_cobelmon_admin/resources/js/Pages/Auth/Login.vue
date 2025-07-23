<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import ValidationErrors from "@/Components/ValidationErrors.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>

    <Head title="Log in" />

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 to-black px-4">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden w-full max-w-4xl flex flex-col md:flex-row">

            <!-- Imagen -->
            <div class="md:w-1/2 bg-black flex items-center justify-center p-6">
                <img src="https://cdn2.steamgriddb.com/icon_thumb/5cc8dfeade12d0c5cd741edb9ae24d81.png"
                    alt="Cobble Land Logo" class="w-3/4 object-contain" />
            </div>

            <!-- Formulario -->
            <div class="w-full md:w-1/2 p-10">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Iniciar sesión en ChirriCobblemon</h2>
                <form @submit.prevent="submit" class="space-y-5">
                    <ValidationErrors />

                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-1">Correo electrónico</label>
                        <input type="email" id="email" name="email" v-model="form.email" required
                            class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </div>

                    <div>
                        <label for="password" class="block text-gray-700 font-medium mb-1">Contraseña</label>
                        <input type="password" id="password" v-model="form.password" name="password" required
                            class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 text-gray-600">
                            <input type="checkbox" name="remember" class="accent-indigo-600" />
                            Recordarme
                        </label>
                        <a href="/forgot-password" class="text-indigo-600 hover:underline">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition">Ingresar</button>
                </form>
            </div>
        </div>
    </div>

</template>
