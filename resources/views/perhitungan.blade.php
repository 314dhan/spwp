@include('layout.header')
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

<div class="container">
    <h3>Perhitungan Bobot Kepentingan</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th></th>
                <th>K1</th>
                <th>K2</th>
                <th>K3</th>
                <th>K4</th>
                <th>K5</th>
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
                    $totalBobot = 0;
                @endphp
                @foreach ($kriterias as $kriteria)
                @php
                    $bobot = $kriteria->kepentingan / $totalKepentingan;
                    $totalBobot += $bobot;
                @endphp
                <td>{{ number_format($bobot, 2) }}</td>
                @endforeach
                <td>{{ number_format($totalBobot, 2) }}</td>
            </tr>
        </tbody>
    </table>
</div>



