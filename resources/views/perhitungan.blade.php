@include('layout.header')

<div class="container">
    <h3>Matrix Alternatif - Kriteria</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Alternatif/Kriteria</th>
                @foreach ($kriterias as $index => $kriteria)
                <th>K{{ $index + 1 }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatifs as $key => $alternatif)
            <tr>
                <td>A{{ $key + 1 }}</td>
                @foreach ($kriterias as $index => $kriteria)
                <td>{{ $alternatif->{'k' . ($index + 1)} }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="container">
    <h3>Perhitungan Bobot Kepentingan</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th></th>
                @foreach ($kriterias as $index => $kriteria)
                <th>K{{ $index + 1 }}</th>
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
                <td>{{ number_format($bobot, 2) }}</td>
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
                @foreach ($kriterias as $index => $kriteria)
                <th>K{{ $index + 1 }}</th>
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
                <td>{{ number_format($pangkat, 2) }}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>

<div class="container">
    <h3>Perhitungan Nilai S</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Alternatif</th>
                <th>Nilai S</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatifs as $key => $alternatif)
            <tr>
                <td>A{{ $key + 1 }}</td>
                <td>{{ number_format($nilaiS[$key], 4) }}</td>
            </tr>
            @endforeach
            <tr>
                <td>Total</td>
                <td>{{ number_format($nilaiS->sum(), 4) }}</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="container">
    <h3>Perhitungan Nilai V</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Alternatif</th>
                <th>Nilai V</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatifs as $key => $alternatif)
            <tr>
                <td>{{ $alternatif->alternatif }}</td>
                <td>{{ number_format($nilaiV[$key], 4) }}</td>
            </tr>
            @endforeach
            <tr>
                <td>Total</td>
                <td>{{ number_format($nilaiV->sum(), 4) }}</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="container">
    <h3>Kesimpulan</h3>
    <p>
        Dari tabel tersebut dapat disimpulkan bahwa {{ $maxAlternatif }} mempunyai hasil paling tinggi, yaitu {{ number_format($maxV, 4) }}.
    </p>
</div>

<div class="container">
    <h3>Perangkingan Nilai V</h3>
    <ul>
        @foreach ($ranking as $rank => $item)
            @if ($rank == 0)
                <li>{{ $item['alternatif'] }} mempunyai hasil paling tinggi (rank 1), yaitu {{ number_format($item['nilaiV'], 4) }}</li>
            @else
                <li>{{ $item['alternatif'] }} dengan nilai {{ number_format($item['nilaiV'], 4) }}</li>
            @endif
        @endforeach
    </ul>
</div>
