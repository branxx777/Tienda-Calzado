<script setup>
import { Head, Link } from '@inertiajs/vue3'

defineProps({
    zapatillas: Array
})
</script>

<template>
    <Head title="Catálogo" />

    <div class="min-h-screen bg-slate-950 text-white">
        <header class="border-b border-slate-800 bg-slate-900/90 shadow-lg">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5">
                <h1 class="text-2xl font-extrabold tracking-tight">
                    👟 Tienda de Calzado
                </h1>

                <div class="flex gap-3">
                    <Link
                        href="/dashboard"
                        class="rounded-xl bg-blue-600 px-5 py-2 font-semibold text-white transition hover:bg-blue-700"
                    >
                        Dashboard
                    </Link>

                    <Link
                        href="/marcas"
                        class="rounded-xl border border-slate-600 bg-slate-800 px-5 py-2 font-semibold text-white transition hover:bg-slate-700"
                    >
                        Administrar
                    </Link>
                </div>
            </div>
        </header>

        <main class="mx-auto max-w-7xl px-6 py-12">
            <section class="mb-10 rounded-3xl border border-slate-800 bg-gradient-to-r from-slate-900 via-slate-800 to-blue-950 p-10 shadow-2xl">
                <p class="mb-3 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">
                    Catálogo visual
                </p>

                <h2 class="text-5xl font-extrabold tracking-tight">
                    Zapatillas disponibles
                </h2>

                <p class="mt-4 max-w-2xl text-slate-300">
                    Visualiza los productos registrados desde el panel administrativo.
                </p>
            </section>

            <div
                v-if="zapatillas.length === 0"
                class="rounded-3xl border border-slate-800 bg-slate-900 p-10 text-center shadow-xl"
            >
                <p class="text-lg text-slate-300">
                    Todavía no hay zapatillas registradas.
                </p>
            </div>

            <div
                v-else
                class="grid grid-cols-1 gap-8 md:grid-cols-3"
            >
                <article
                    v-for="zapatilla in zapatillas"
                    :key="zapatilla.id"
                    class="group overflow-hidden rounded-3xl border border-slate-800 bg-slate-900 shadow-xl transition duration-300 hover:-translate-y-2 hover:border-blue-500 hover:shadow-blue-900/40"
                >
                    <div class="relative">
                        <img
                            v-if="zapatilla.imagen"
                            :src="`/storage/${zapatilla.imagen}`"
                            class="h-72 w-full object-cover transition duration-300 group-hover:scale-105"
                        >

                        <div
                            v-else
                            class="flex h-72 items-center justify-center bg-slate-800 text-slate-400"
                        >
                            Sin imagen
                        </div>

                        <div class="absolute left-4 top-4 rounded-full bg-blue-600 px-4 py-1 text-sm font-bold shadow">
                            {{ zapatilla.marca?.nombre ?? 'Sin marca' }}
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="mb-3 text-2xl font-bold">
                            {{ zapatilla.modelo }}
                        </h3>

                        <div class="mb-5 flex items-center gap-3">
                            <span class="rounded-full bg-slate-800 px-4 py-2 text-sm text-slate-300">
                                Talla {{ zapatilla.talla }}
                            </span>

                            <span class="rounded-full bg-slate-800 px-4 py-2 text-sm text-slate-300">
                                Producto
                            </span>
                        </div>

                        <div class="flex items-center justify-between border-t border-slate-800 pt-5">
                            <p class="text-sm text-slate-400">
                                Precio
                            </p>

                            <p class="text-3xl font-extrabold text-green-400">
                                S/ {{ zapatilla.precio }}
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </main>
    </div>
</template>