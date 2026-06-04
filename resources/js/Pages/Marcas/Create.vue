<script setup>
import { Link, useForm } from '@inertiajs/vue3'

const form = useForm({
    nombre: '',
    descripcion: ''
})

const guardar = () => {
    form.post('/marcas')
}
</script>

<template>
    <div class="min-h-screen bg-slate-950 p-8 text-white">

```
    <div class="mx-auto max-w-3xl">

        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-extrabold">
                    ➕ Nueva Marca
                </h1>

                <p class="mt-2 text-slate-400">
                    Registra una nueva marca en el sistema.
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

            <form @submit.prevent="guardar">

                <div class="mb-6">
                    <label class="mb-2 block font-semibold">
                        Nombre de la Marca
                    </label>

                    <input
                        v-model="form.nombre"
                        type="text"
                        placeholder="Ejemplo: Nike"
                        class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white outline-none focus:border-blue-500"
                    >

                    <p
                        v-if="form.errors.nombre"
                        class="mt-2 text-sm text-red-400"
                    >
                        {{ form.errors.nombre }}
                    </p>
                </div>

                <div class="mb-8">
                    <label class="mb-2 block font-semibold">
                        Descripción
                    </label>

                    <textarea
                        v-model="form.descripcion"
                        rows="4"
                        placeholder="Descripción de la marca..."
                        class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white outline-none focus:border-blue-500"
                    ></textarea>
                </div>

                <div class="flex justify-between">
                    <Link
                        href="/marcas"
                        class="rounded-xl bg-slate-700 px-5 py-3 font-semibold text-white hover:bg-slate-600"
                    >
                        Volver
                    </Link>

                    <button
                        type="submit"
                        class="rounded-xl bg-blue-600 px-6 py-3 font-semibold text-white hover:bg-blue-700"
                    >
                        Guardar Marca
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>
```

</template>
