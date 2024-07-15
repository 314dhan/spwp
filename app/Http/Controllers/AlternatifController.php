<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AlternatifController extends Controller
{
    public function index(): View
    {
        $alternatifs = Alternatif::all();
        return view('alternatif', compact('alternatifs'));
    }

    public function create(): View
    {
        return view('alternatif.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'alternatif' => 'required|string',
            'k1' => 'required|numeric|min:1|max:5',
            'k2' => 'required|numeric|min:1|max:5',
            'k3' => 'required|numeric|min:1|max:5',
            'k4' => 'required|numeric|min:1|max:5',
            'k5' => 'required|numeric|min:1|max:5',
        ]);

        Alternatif::create([
            'alternatif' => $request->alternatif,
            'k1' => $request->k1,
            'k2' => $request->k2,
            'k3' => $request->k3,
            'k4' => $request->k4,
            'k5' => $request->k5,
        ]);

        return redirect()->route('alternatif.index')->with('success', 'Alternatif created successfully.');
    }

    public function edit(Alternatif $alternatif): View
    {
        return view('alternatif.edit', compact('alternatif'));
    }

    public function update(Request $request, Alternatif $alternatif): RedirectResponse
    {
        $request->validate([
            'alternatif' => 'required|string',
            'k1' => 'required|numeric|min:1|max:5',
            'k2' => 'required|numeric|min:1|max:5',
            'k3' => 'required|numeric|min:1|max:5',
            'k4' => 'required|numeric|min:1|max:5',
            'k5' => 'required|numeric|min:1|max:5',
        ]);

        $alternatif->update([
            'alternatif' => $request->alternatif,
            'k1' => $request->k1,
            'k2' => $request->k2,
            'k3' => $request->k3,
            'k4' => $request->k4,
            'k5' => $request->k5,
        ]);

        return redirect()->route('alternatif.index')->with('success', 'Alternatif updated successfully.');
    }

    public function destroy(Alternatif $alternatif): RedirectResponse
    {
        $alternatif->delete();

        return redirect()->route('alternatif.index')->with('success', 'Alternatif deleted successfully.');
    }
}
