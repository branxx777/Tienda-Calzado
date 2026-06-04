<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::latest()->get();

        return Inertia::render('Marcas/Index', [
            'marcas' => $marcas
        ]);
    }

    public function create()
    {
        return Inertia::render('Marcas/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable|max:255',
        ]);

        Marca::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('marcas.index');
    }

    public function edit(Marca $marca)
    {
        return Inertia::render('Marcas/Edit', [
            'marca' => $marca
        ]);
    }

    public function update(Request $request, Marca $marca)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable|max:255',
        ]);

        $marca->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('marcas.index');
    }

    public function destroy(Marca $marca)
    {
        $marca->delete();

        return redirect()->route('marcas.index');
    }
}