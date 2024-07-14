<?php

// app/Http/Controllers/KriteriaController.php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class KriteriaController extends Controller
{
    public function index(): View
    {
        $kriterias = Kriteria::all();
        return view('kriteria', compact('kriterias'));
    }

    public function create(): View
    {
        return view('kriteria.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_kriteria' => 'required|string'
        ]);

        Kriteria::create($request->all());

        return redirect()->route('kriteria.index')->with('success', 'Kriteria created successfully.');
    }

    public function edit(Kriteria $kriteria): View
    {
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria): RedirectResponse
    {
        $request->validate([
            'nama_kriteria' => 'required|string',
        ]);

        $kriteria->update($request->all());

        return redirect()->route('kriteria.index')->with('success', 'Kriteria updated successfully.');
    }

    public function destroy(Kriteria $kriteria): RedirectResponse
    {
        $kriteria->delete();

        return redirect()->route('kriteria.index')->with('success', 'Kriteria deleted successfully.');
    }
}

