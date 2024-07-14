<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skala;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SkalaController extends Controller
{
    public function index(): View
    {
        $skalas = Skala::all();
        return view('skala', compact('skalas'));
    }

    public function create(): View
    {
        return view('skala.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_skala' => 'required',
            'nilai_skala' => 'required|numeric',
        ]);

        $skala = new Skala();
        $skala->nama_skala = $request->input('nama_skala');
        $skala->nilai_skala = $request->input('nilai_skala');
        $skala->save();

        return redirect()->route('skala.index')->with('success', 'Skala created successfully.');
    }

    public function edit(Skala $skala): View
    {
        return view('skala.edit', compact('skala'));
    }

    public function update(Request $request, Skala $skala): RedirectResponse
    {
        $request->validate([
            'nama_skala' => 'required',
            'nilai_skala' => 'required|numeric',
        ]);

        $skala->nama_skala = $request->input('nama_skala');
        $skala->nilai_skala = $request->input('nilai_skala');
        $skala->save();

        return redirect()->route('skala.index')->with('success', 'Skala updated successfully.');
    }

    public function destroy(Skala $skala): RedirectResponse
    {
        $skala->delete();
        return redirect()->route('skala.index')->with('success', 'Skala deleted successfully.');
    }
}
