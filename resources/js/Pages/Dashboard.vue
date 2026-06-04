<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3'
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-bold leading-tight text-white">
                Panel Administrativo
            </h2>
        </template>

        <div class="min-h-screen bg-[#0f172a] py-10 text-white">
            <div class="mx-auto max-w-7xl px-6">

                <section class="mb-10 overflow-hidden rounded-3xl border border-slate-700 bg-gradient-to-br from-slate-900 via-slate-800 to-blue-950 p-10 shadow-2xl">
                    <div class="max-w-3xl">
                        <p class="mb-3 text-sm font-semibold uppercase tracking-[0.3em] text-blue-300">
                            Sistema web Laravel + Vue
                        </p>

                        <h1 class="mb-4 text-5xl font-extrabold tracking-tight">
                            👟 Tienda de Calzado
                        </h1>

                        <p class="text-lg leading-relaxed text-slate-300">
                            Plataforma administrativa para gestionar marcas y zapatillas,
                            incluyendo operaciones CRUD, relación entre tablas, carga de imágenes
                            y visualización tipo catálogo.
                        </p>
                    </div>
                </section>

                <section class="grid grid-cols-1 gap-8 md:grid-cols-3">

                    <div class="group rounded-3xl border border-slate-700 bg-slate-900 p-8 shadow-xl transition duration-300 hover:-translate-y-2 hover:border-blue-500 hover:shadow-blue-900/40">
                        <div class="mb-6 flex h-16 w-16 items-center justify-center rounded-2xl bg-blue-600 text-4xl shadow-lg">
                            🏷️
                        </div>

                        <h3 class="mb-3 text-2xl font-bold">
                            Gestión de Marcas
                        </h3>

                        <p class="mb-8 text-slate-400">
                            Administra el registro de marcas disponibles para las zapatillas.
                        </p>

                        <Link
                            href="/marcas"
                            class="inline-flex items-center rounded-xl bg-blue-600 px-5 py-3 font-semibold text-white transition hover:bg-blue-700"
                        >
                            Ir a Marcas →
                        </Link>
                    </div>

                    <div class="group rounded-3xl border border-slate-700 bg-slate-900 p-8 shadow-xl transition duration-300 hover:-translate-y-2 hover:border-green-500 hover:shadow-green-900/40">
                        <div class="mb-6 flex h-16 w-16 items-center justify-center rounded-2xl bg-green-600 text-4xl shadow-lg">
                            👟
                        </div>

                        <h3 class="mb-3 text-2xl font-bold">
                            Gestión de Zapatillas
                        </h3>

                        <p class="mb-8 text-slate-400">
                            Registra modelos, tallas, precios, imágenes y su marca relacionada.
                        </p>

                        <Link
                            href="/zapatillas"
                            class="inline-flex items-center rounded-xl bg-green-600 px-5 py-3 font-semibold text-white transition hover:bg-green-700"
                        >
                            Ir a Zapatillas →
                        </Link>
                    </div>

                    <div class="group rounded-3xl border border-slate-700 bg-slate-900 p-8 shadow-xl transition duration-300 hover:-translate-y-2 hover:border-purple-500 hover:shadow-purple-900/40">
                        <div class="mb-6 flex h-16 w-16 items-center justify-center rounded-2xl bg-purple-600 text-4xl shadow-lg">
                            🛒
                        </div>

                        <h3 class="mb-3 text-2xl font-bold">
                            Catálogo Visual
                        </h3>

                        <p class="mb-8 text-slate-400">
                            Muestra las zapatillas registradas en una vista moderna tipo tienda.
                        </p>

                        <Link
                            href="/catalogo"
                            class="inline-flex items-center rounded-xl bg-purple-600 px-5 py-3 font-semibold text-white transition hover:bg-purple-700"
                        >
                            Ver Catálogo →
                        </Link>
                    </div>

                </section>

            </div>
        </div>
    </AuthenticatedLayout>
</template>