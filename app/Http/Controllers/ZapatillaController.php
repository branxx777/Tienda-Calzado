<?php

namespace App\Http\Controllers;

use App\Models\Zapatilla;
use App\Models\Marca;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ZapatillaController extends Controller
{
    public function index()
    {
        $zapatillas = Zapatilla::with('marca')->latest()->get();

        return Inertia::render('Zapatillas/Index', [
            'zapatillas' => $zapatillas
        ]);
    }

    public function create()
    {
        return Inertia::render('Zapatillas/Create', [
            'marcas' => Marca::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'marca_id' => 'required',
            'modelo' => 'required',
            'talla' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagenPath = null;

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('zapatillas', 'public');
        }

        Zapatilla::create([
            'marca_id' => $request->marca_id,
            'modelo' => $request->modelo,
            'talla' => $request->talla,
            'precio' => $request->precio,
            'imagen' => $imagenPath,
        ]);

        return redirect()->route('zapatillas.index');
    }

    public function edit(Zapatilla $zapatilla)
    {
        return Inertia::render('Zapatillas/Edit', [
            'zapatilla' => $zapatilla,
            'marcas' => Marca::all()
        ]);
    }

    public function update(Request $request, Zapatilla $zapatilla)
    {
        $request->validate([
            'marca_id' => 'required',
            'modelo' => 'required',
            'talla' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagenPath = $zapatilla->imagen;

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('zapatillas', 'public');
        }

        $zapatilla->update([
            'marca_id' => $request->marca_id,
            'modelo' => $request->modelo,
            'talla' => $request->talla,
            'precio' => $request->precio,
            'imagen' => $imagenPath,
        ]);

        return redirect()->route('zapatillas.index');
    }

    public function destroy(Zapatilla $zapatilla)
    {
        $zapatilla->delete();

        return redirect()->route('zapatillas.index');
    }
}