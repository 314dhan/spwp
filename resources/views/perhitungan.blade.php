@include('layout.header')
{{-- Tabel Matrix Alternatif - Kriteria --}}
<div class="container">
 <div class="container">
    <h3>Matrix Alternatif - Kriteria</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Alternatif/Kriteria</th>
                <th>K1</th>
                <th>K2</th>
                <th>K3</th>
                <th>K4</th>
                <th>K5</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($alternatifs as $key => $alternatif)
            <tr>
                <td>A{{ $key + 1 }}</td>
                <td>{{ $alternatif->k1 }}</td>
                <td>{{ $alternatif->k2 }}</td>
                <td>{{ $alternatif->k3 }}</td>
                <td>{{ $alternatif->k4 }}</td>
                <td>{{ $alternatif->k5 }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Tabel Bobot Kepentingan --}}
<div class="container">
    <h3>Perhitungan Bobot Kepentingan</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th></th>
                @foreach ($kriterias as $kriteria)
                <th>{{ $kriteria->kriteria }}</th>
                @endforeach
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Kepentingan</td>
                @php
                    $totalKepentingan = 0;
                @endphp
                @foreach ($kriterias as $kriteria)
                <td>{{ $kriteria->kepentingan }}</td>
                @php
                    $totalKepentingan += $kriteria->kepentingan;
                @endphp
                @endforeach
                <td>{{ $totalKepentingan }}</td>
            </tr>
            <tr>
                <td>Bobot Kepentingan</td>
                @php
                    $bobotKepentingan = [];
                @endphp
                @foreach ($kriterias as $kriteria)
                @php
                    $bobot = $kriteria->kepentingan / $totalKepentingan;
                    $bobotKepentingan[] = $bobot;
                @endphp
                <td>{{ number_format($bobot, 3) }}</td>
                @endforeach
                <td>{{ number_format(array_sum($bobotKepentingan), 2) }}</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="container">
    <h3>Perhitungan Pangkat</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th></th>
                @foreach ($kriterias as $kriteria)
                <th>{{ $kriteria->kriteria }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Cost/Benefit</td>
                @foreach ($kriterias as $kriteria)
                <td>{{ $kriteria->cost_benefit }}</td>
                @endforeach
            </tr>
            <tr>
                <td>Pangkat</td>
                @foreach ($kriterias as $index => $kriteria)
                @php
                    $pangkat = $bobotKepentingan[$index];
                    if ($kriteria->cost_benefit == 'cost') {
                        $pangkat = -$pangkat;
                    }
                @endphp
                <td>{{ number_format($pangkat, 3) }}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
