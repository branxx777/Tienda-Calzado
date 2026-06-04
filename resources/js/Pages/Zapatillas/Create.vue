<script setup>
import { Link, useForm } from '@inertiajs/vue3'

defineProps({
    marcas: Array
})

const form = useForm({
    marca_id: '',
    modelo: '',
    talla: '',
    precio: '',
    imagen: null
})

const guardar = () => {
    form.post('/zapatillas', {
        forceFormData: true
    })
}
</script>

<template>
    <div class="min-h-screen bg-slate-950 p-8 text-white">
        <div class="mx-auto max-w-4xl">

            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-extrabold">
                        ➕ Registrar Zapatilla
                    </h1>

                    <p class="mt-2 text-slate-400">
                        Agrega una nueva zapatilla con marca, talla, precio e imagen.
                    </p>
                </div>

                <Link
                    href="/dashboard"
                    class="rounded-xl bg-slate-800 px-5 py-3 font-semibold text-white hover:bg-slate-700"
                >
                    Dashboard
                </Link>
            </div>

            <div class="rounded-3xl border border-slate-800 bg-slate-900 p-8 shadow-2xl">
                <form @submit.prevent="guardar" class="grid grid-cols-1 gap-6 md:grid-cols-2">

                    <div>
                        <label class="mb-2 block font-semibold">
                            Marca
                        </label>

                        <select
                            v-model="form.marca_id"
                            class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white outline-none focus:border-green-500"
                        >
                            <option value="">
                                Seleccione una marca
                            </option>

                            <option
                                v-for="marca in marcas"
                                :key="marca.id"
                                :value="marca.id"
                            >
                                {{ marca.nombre }}
                            </option>
                        </select>

                        <p v-if="form.errors.marca_id" class="mt-2 text-sm text-red-400">
                            {{ form.errors.marca_id }}
                        </p>
                    </div>

                    <div>
                        <label class="mb-2 block font-semibold">
                            Modelo
                        </label>

                        <input
                            v-model="form.modelo"
                            type="text"
                            placeholder="Ejemplo: Air Max"
                            class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white outline-none focus:border-green-500"
                        >

                        <p v-if="form.errors.modelo" class="mt-2 text-sm text-red-400">
                            {{ form.errors.modelo }}
                        </p>
                    </div>

                    <div>
                        <label class="mb-2 block font-semibold">
                            Talla
                        </label>

                        <input
                            v-model="form.talla"
                            type="text"
                            placeholder="Ejemplo: 42"
                            class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white outline-none focus:border-green-500"
                        >

                        <p v-if="form.errors.talla" class="mt-2 text-sm text-red-400">
                            {{ form.errors.talla }}
                        </p>
                    </div>

                    <div>
                        <label class="mb-2 block font-semibold">
                            Precio
                        </label>

                        <input
                            v-model="form.precio"
                            type="number"
                            step="0.01"
                            placeholder="Ejemplo: 199.90"
                            class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white outline-none focus:border-green-500"
                        >

                        <p v-if="form.errors.precio" class="mt-2 text-sm text-red-400">
                            {{ form.errors.precio }}
                        </p>
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-2 block font-semibold">
                            Imagen de la zapatilla
                        </label>

                        <div class="rounded-2xl border border-dashed border-slate-600 bg-slate-800 p-6">
                            <input
                                type="file"
                                @input="form.imagen = $event.target.files[0]"
                                class="w-full text-slate-300 file:mr-4 file:rounded-lg file:border-0 file:bg-green-600 file:px-4 file:py-2 file:font-semibold file:text-white hover:file:bg-green-700"
                            >

                            <p class="mt-3 text-sm text-slate-400">
                                Formatos permitidos: JPG, PNG, WEBP.
                            </p>
                        </div>

                        <p v-if="form.errors.imagen" class="mt-2 text-sm text-red-400">
                            {{ form.errors.imagen }}
                        </p>
                    </div>

                    <div class="md:col-span-2 flex justify-between border-t border-slate-800 pt-6">
                        <Link
                            href="/zapatillas"
                            class="rounded-xl bg-slate-700 px-5 py-3 font-semibold text-white hover:bg-slate-600"
                        >
                            Volver
                        </Link>

                        <button
                            type="submit"
                            class="rounded-xl bg-green-600 px-6 py-3 font-semibold text-white hover:bg-green-700"
                        >
                            Guardar Zapatilla
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</template>