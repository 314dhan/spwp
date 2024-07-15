<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KriteriaController extends Controller
{
    public function index(): View
    {
        $kriterias = Kriteria::all();
        return view('kriteria', compact('kriterias'));
    }

    public function create(): View
    {
        return view('kriterias.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'kriteria' => 'required|string',
            'kepentingan' => 'required|numeric|min:1|max:5',
            'cost_benefit' => 'required|string|in:cost,benefit',
        ]);

        Kriteria::create([
            'kriteria' => $request->kriteria,
            'kepentingan' => $request->kepentingan,
            'cost_benefit' => $request->cost_benefit,
        ]);

        return redirect()->route('kriteria.index')->with('success', 'Kriteria created successfully.');
    }

    public function edit(Kriteria $kriteria): View
    {
        return view('kriterias.edit', compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria): RedirectResponse
    {
        $request->validate([
            'kriteria' => 'required|string',
            'kepentingan' => 'required|numeric|min:1|max:5',
            'cost_benefit' => 'required|string|in:cost,benefit',
        ]);

        $kriteria->update([
            'kriteria' => $request->kriteria,
            'kepentingan' => $request->kepentingan,
            'cost_benefit' => $request->cost_benefit,
        ]);

        return redirect()->route('kriteria.index')->with('success', 'Kriteria updated successfully.');
    }

    public function destroy(Kriteria $kriteria): RedirectResponse
    {
        $kriteria->delete();

        return redirect()->route('kriteria.index')->with('success', 'Kriteria deleted successfully.');
    }
}
