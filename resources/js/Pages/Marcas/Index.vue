<script setup>
import { Link, router } from '@inertiajs/vue3'

defineProps({
    marcas: Array
})

const eliminar = (id) => {
    if (confirm('¿Seguro que deseas eliminar esta marca?')) {
        router.delete(`/marcas/${id}`)
    }
}
</script>

<template>
    <div class="min-h-screen bg-slate-950 text-white p-8">

```
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-extrabold">
                🏷️ Gestión de Marcas
            </h1>

            <p class="mt-2 text-slate-400">
                Administra las marcas registradas en el sistema.
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
                href="/marcas/create"
                class="rounded-xl bg-blue-600 px-5 py-3 font-semibold text-white hover:bg-blue-700"
            >
                Nueva Marca
            </Link>
        </div>
    </div>

    <div class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-900 shadow-2xl">

        <div class="border-b border-slate-800 p-6">
            <h2 class="text-xl font-bold">
                Lista de Marcas
            </h2>
        </div>

        <table class="w-full">
            <thead class="bg-slate-800">
                <tr>
                    <th class="p-4 text-left">ID</th>
                    <th class="p-4 text-left">Nombre</th>
                    <th class="p-4 text-left">Descripción</th>
                    <th class="p-4 text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <tr
                    v-for="marca in marcas"
                    :key="marca.id"
                    class="border-b border-slate-800 hover:bg-slate-800/40"
                >
                    <td class="p-4">
                        #{{ marca.id }}
                    </td>

                    <td class="p-4 font-semibold">
                        {{ marca.nombre }}
                    </td>

                    <td class="p-4 text-slate-400">
                        {{ marca.descripcion }}
                    </td>

                    <td class="p-4 text-center">
                        <div class="flex justify-center gap-3">

                            <Link
                                :href="`/marcas/${marca.id}/edit`"
                                class="rounded-lg bg-yellow-500 px-4 py-2 text-sm font-semibold text-white hover:bg-yellow-600"
                            >
                                Editar
                            </Link>

                            <button
                                @click="eliminar(marca.id)"
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
```

</template>
