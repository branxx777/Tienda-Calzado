<script setup>
import { Link, useForm } from '@inertiajs/vue3'

const props = defineProps({
    zapatilla: Object,
    marcas: Array
})

const form = useForm({
    _method: 'put',
    marca_id: props.zapatilla.marca_id,
    modelo: props.zapatilla.modelo,
    talla: props.zapatilla.talla,
    precio: props.zapatilla.precio,
    imagen: null
})

const actualizar = () => {
    form.post(`/zapatillas/${props.zapatilla.id}`, {
        forceFormData: true
    })
}

</script>

<template>
    <div class="min-h-screen bg-slate-950 p-8 text-white">
        <div class="mx-auto max-w-5xl">

            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-extrabold">
                        ✏️ Editar Zapatilla
                    </h1>

                    <p class="mt-2 text-slate-400">
                        Actualiza los datos, marca, precio o imagen de la zapatilla.
                    </p>
                </div>

                <Link
                    href="/dashboard"
                    class="rounded-xl bg-slate-800 px-5 py-3 font-semibold text-white hover:bg-slate-700"
                >
                    Dashboard
                </Link>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">

                <div class="rounded-3xl border border-slate-800 bg-slate-900 p-6 shadow-2xl">
                    <h2 class="mb-4 text-xl font-bold">
                        Imagen actual
                    </h2>

                    <img
                        v-if="props.zapatilla.imagen"
                        :src="`/storage/${props.zapatilla.imagen}`"
                        class="h-80 w-full rounded-2xl object-cover shadow-lg"
                    >

                    <div
                        v-else
                        class="flex h-80 items-center justify-center rounded-2xl bg-slate-800 text-slate-400"
                    >
                        Sin imagen
                    </div>
                </div>

                <div class="md:col-span-2 rounded-3xl border border-slate-800 bg-slate-900 p-8 shadow-2xl">
                    <form @submit.prevent="actualizar" class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        <div>
                            <label class="mb-2 block font-semibold">
                                Marca
                            </label>

                            <select
                                v-model="form.marca_id"
                                class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white outline-none focus:border-green-500"
                            >
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
                                class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white outline-none focus:border-green-500"
                            >

                            <p v-if="form.errors.precio" class="mt-2 text-sm text-red-400">
                                {{ form.errors.precio }}
                            </p>
                        </div>

                        <div class="md:col-span-2">
                            <label class="mb-2 block font-semibold">
                                Cambiar imagen
                            </label>

                            <div class="rounded-2xl border border-dashed border-slate-600 bg-slate-800 p-6">
                                <input
                                    type="file"
                                    @input="form.imagen = $event.target.files[0]"
                                    class="w-full text-slate-300 file:mr-4 file:rounded-lg file:border-0 file:bg-green-600 file:px-4 file:py-2 file:font-semibold file:text-white hover:file:bg-green-700"
                                >

                                <p class="mt-3 text-sm text-slate-400">
                                    Si no seleccionas una nueva imagen, se mantendrá la imagen actual.
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
                                Actualizar Zapatilla
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</template>