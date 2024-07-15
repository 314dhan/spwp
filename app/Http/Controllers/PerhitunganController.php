<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();

        // Hitung nilai total kepentingan
        $totalKepentingan = $kriterias->sum('kepentingan');

        // Hitung bobot kepentingan
        $bobotKepentingan = $kriterias->map(function ($kriteria) use ($totalKepentingan) {
            return $kriteria->kepentingan / $totalKepentingan;
        });

        // Hitung nilai S
        $nilaiS = $alternatifs->map(function ($alternatif) use ($bobotKepentingan, $kriterias) {
            $s = 1;
            foreach ($kriterias as $index => $kriteria) {
                $nilai = $alternatif->{'k' . ($index + 1)};
                $pangkat = $bobotKepentingan[$index];
                if ($kriteria->cost_benefit == 'cost') {
                    $pangkat = -$pangkat; // Jika cost, pangkatnya negatif
                }
                $s *= pow($nilai, $pangkat);
            }
            return $s;
        });

        // Hitung total nilai S
        $totalNilaiS = $nilaiS->sum();

        // Hitung nilai V untuk setiap alternatif
        $nilaiV = $nilaiS->map(function ($s) use ($totalNilaiS) {
            return $s / $totalNilaiS;
        });

        return view('perhitungan', compact('alternatifs', 'kriterias', 'nilaiS', 'nilaiV', 'bobotKepentingan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
