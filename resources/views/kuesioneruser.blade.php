@include('layout.header')
    <div class="container">
        <h1>Form Penilaian Keamanan Siber</h1>
        <form action="/submit" method="post">
            <h2>Penilaian Pengguna</h2>
            <label for="q1">1. Bagaimana tingkat pengetahuan Anda tentang alamat keamanan siber? Skala 1 (Tidak Penting) - 5 (Sangat Penting)</label>
            <select id="q1" name="q1" required>
                <option value="">Pilih</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br><br>

            <label for="q2">2. Efektivitas: Seberapa penting menurut Anda efektivitas sebuah alat keamanan siber dalam melindungi sistem dari ancaman? Skala: 1 (Tidak Penting) - 5 (Sangat Penting)</label>
            <select id="q2" name="q2" required>
                <option value="">Pilih</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br><br>

            <label for="q3">3. Biaya: Seberapa penting menurut Anda faktor biaya dalam memilih alat keamanan siber? Skala: 1 (Tidak Penting) - 5 (Sangat Penting)</label>
            <select id="q3" name="q3" required>
                <option value="">Pilih</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br><br>

            <label for="q4">4. Kemudahan Penggunaan: Seberapa penting bagi Anda untuk memiliki antarmuka yang intuitif dan kemudahan dalam mengelola alat keamanan siber? Skala: 1 (Tidak Penting) - 5 (Sangat Penting)</label>
            <select id="q4" name="q4" required>
                <option value="">Pilih</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br><br>

            <label for="q5">5. Dukungan Teknis: Seberapa penting bagi Anda untuk memiliki dukungan teknis yang berkualitas dari vendor alat keamanan siber? Skala: 1 (Tidak Penting) - 5 (Sangat Penting)</label>
            <select id="q5" name="q5" required>
                <option value="">Pilih</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br><br>

            <label for="q6">6. Kompatibilitas: Seberapa penting bagi Anda untuk memiliki alat keamanan siber yang kompatibel dengan infrastruktur IT yang sudah ada di organisasi? Skala: 1 (Tidak Penting) - 5 (Sangat Penting)</label>
            <select id="q6" name="q6" required>
                <option value="">Pilih</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br><br>

            <button type="submit">Kirim</button>
        </form>
    </div>

