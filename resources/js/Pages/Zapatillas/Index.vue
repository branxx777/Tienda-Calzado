<script setup>
import { Link, router } from '@inertiajs/vue3'

defineProps({
    zapatillas: Array
})

const eliminar = (id) => {
    if (confirm('¿Seguro que deseas eliminar esta zapatilla?')) {
        router.delete(`/zapatillas/${id}`)
    }
}
</script>

<template>
    <div class="min-h-screen bg-slate-950 p-8 text-white">

        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-extrabold">
                    👟 Gestión de Zapatillas
                </h1>

                <p class="mt-2 text-slate-400">
                    Administra modelos, tallas, precios, imágenes y marcas relacionadas.
                </p>
            </div>

            <div class="flex gap-3">
                <Link
                    href="/dashboard"
                    class="rounded-xl bg-slate-800 px-5 py-3 font-semibold text-white hover:bg-slate-700"
                >
                    Dashboard
                </Link>

                <Link
                    href="/marcas"
                    class="rounded-xl bg-indigo-600 px-5 py-3 font-semibold text-white hover:bg-indigo-700"
                >
                    Marcas
                </Link>

                <Link
                    href="/zapatillas/create"
                    class="rounded-xl bg-green-600 px-5 py-3 font-semibold text-white hover:bg-green-700"
                >
                    Nueva Zapatilla
                </Link>
            </div>
        </div>

        <div
            v-if="zapatillas.length === 0"
            class="rounded-3xl border border-slate-800 bg-slate-900 p-10 text-center shadow-2xl"
        >
            <p class="text-lg text-slate-300">
                Todavía no hay zapatillas registradas.
            </p>
        </div>

        <div
            v-else
            class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-900 shadow-2xl"
        >
            <div class="border-b border-slate-800 p-6">
                <h2 class="text-xl font-bold">
                    Lista de Zapatillas
                </h2>
            </div>

            <table class="w-full">
                <thead class="bg-slate-800">
                    <tr>
                        <th class="p-4 text-left">Imagen</th>
                        <th class="p-4 text-left">Modelo</th>
                        <th class="p-4 text-left">Marca</th>
                        <th class="p-4 text-center">Talla</th>
                        <th class="p-4 text-right">Precio</th>
                        <th class="p-4 text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="zapatilla in zapatillas"
                        :key="zapatilla.id"
                        class="border-b border-slate-800 transition hover:bg-slate-800/50"
                    >
                        <td class="p-4">
                            <img
                                v-if="zapatilla.imagen"
                                :src="`/storage/${zapatilla.imagen}`"
                                class="h-20 w-20 rounded-2xl object-cover shadow-lg"
                            >

                            <div
                                v-else
                                class="flex h-20 w-20 items-center justify-center rounded-2xl bg-slate-800 text-xs text-slate-400"
                            >
                                Sin imagen
                            </div>
                        </td>

                        <td class="p-4">
                            <p class="font-bold">
                                {{ zapatilla.modelo }}
                            </p>
                            <p class="text-sm text-slate-400">
                                Producto registrado
                            </p>
                        </td>

                        <td class="p-4">
                            <span class="rounded-full bg-blue-600/20 px-4 py-2 text-sm font-semibold text-blue-300">
                                {{ zapatilla.marca?.nombre ?? 'Sin marca' }}
                            </span>
                        </td>

                        <td class="p-4 text-center">
                            <span class="rounded-full bg-slate-800 px-4 py-2 text-sm text-slate-300">
                                {{ zapatilla.talla }}
                            </span>
                        </td>

                        <td class="p-4 text-right">
                            <span class="text-xl font-extrabold text-green-400">
                                S/ {{ zapatilla.precio }}
                            </span>
                        </td>

                        <td class="p-4">
                            <div class="flex justify-center gap-3">
                                <Link
                                    :href="`/zapatillas/${zapatilla.id}/edit`"
                                    class="rounded-lg bg-yellow-500 px-4 py-2 text-sm font-semibold text-white hover:bg-yellow-600"
                                >
                                    Editar
                                </Link>

                                <button
                                    @click="eliminar(zapatilla.id)"
                                    class="rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-700"
                                >
                                    Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>