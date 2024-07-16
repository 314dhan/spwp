@include('layout.header')

<div class="container">
    <h1>Alternatif</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
        Create Alternatif
    </button>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Alternatif</th>
                <th>K1</th>
                <th>K2</th>
                <th>K3</th>
                <th>K4</th>
                <th>K5</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatifs as $key => $alternatif)
            <tr>
                <td>A{{ $key + 1 }}</td>
                <td>{{ $alternatif->alternatif }}</td>
                <td>{{ $alternatif->k1 }}</td>
                <td>{{ $alternatif->k2 }}</td>
                <td>{{ $alternatif->k3 }}</td>
                <td>{{ $alternatif->k4 }}</td>
                <td>{{ $alternatif->k5 }}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $alternatif->id_alternatif }}">
                        Edit
                    </button>
                    <form action="{{ route('alternatif.destroy', $alternatif->id_alternatif) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <!-- Modal Edit -->
            <div class="modal fade" id="editModal{{ $alternatif->id_alternatif }}" tabindex="-1" aria-labelledby="editModalLabel{{ $alternatif->id_alternatif }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $alternatif->id_alternatif }}">Edit Alternatif</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form Edit -->
                            <form action="{{ route('alternatif.update', $alternatif->id_alternatif) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="edit_nama_alternatif{{ $alternatif->id_alternatif }}" class="form-label">Nama Alternatif</label>
                                    <input type="text" class="form-control" id="edit_nama_alternatif{{ $alternatif->id_alternatif }}" name="alternatif" value="{{ $alternatif->alternatif }}">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_k1{{ $alternatif->id_alternatif }}" class="form-label">K1: Seberapa baik produk ini dalam mendeteksi dan mencegah serangan keamanan yang kompleks dan baru?</label>
                                    <select class="form-select" id="edit_k1{{ $alternatif->id_alternatif }}" name="k1" required>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}" @if ($i == $alternatif->k1) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_k2{{ $alternatif->id_alternatif }}" class="form-label">K2: Bagaimana perbandingan biaya produk ini dengan manfaat dan perlindungan keamanan yang diberikan?</label>
                                    <select class="form-select" id="edit_k2{{ $alternatif->id_alternatif }}" name="k2" required>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}" @if ($i == $alternatif->k2) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_k3{{ $alternatif->id_alternatif }}" class="form-label">K3: Seberapa intuitif antarmuka pengguna produk ini bagi administrator yang tidak memiliki latar belakang teknis yang mendalam?</label>
                                    <select class="form-select" id="edit_k3{{ $alternatif->id_alternatif }}" name="k3" required>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}" @if ($i == $alternatif->k3) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_k4{{ $alternatif->id_alternatif }}" class="form-label">K4: Seberapa baik dukungan teknis yang diberikan oleh penyedia produk dalam menanggapi masalah teknis dan pemeliharaan?</label>
                                    <select class="form-select" id="edit_k4{{ $alternatif->id_alternatif }}" name="k4" required>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}" @if ($i == $alternatif->k4) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_k5{{ $alternatif->id_alternatif }}" class="form-label">K5: Sejauh mana produk ini dapat berintegrasi dengan infrastruktur teknologi yang sudah ada tanpa mengalami konflik atau gangguan?</label>
                                    <select class="form-select" id="edit_k5{{ $alternatif->id_alternatif }}" name="k5" required>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}" @if ($i == $alternatif->k5) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Create -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create Alternatif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Create -->
                <form action="{{ route('alternatif.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="create_alternatif" class="form-label">Nama Alternatif</label>
                        <input type="text" class="form-control" id="create_alternatif" name="alternatif" required>
                    </div>
                    <div class="mb-3">
                        <label for="create_k1" class="form-label">K1: Seberapa baik produk ini dalam mendeteksi dan mencegah serangan keamanan yang kompleks dan baru?</label>
                        <select class="form-select" id="create_k1" name="k1" required>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="create_k2" class="form-label">K2: Seberapa baik produk ini dalam mendeteksi dan mencegah serangan keamanan yang kompleks dan baru?</label>
                        <select class="form-select" id="create_k2" name="k2" required>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="create_k3" class="form-label">K3: Seberapa baik produk ini dalam mendeteksi dan mencegah serangan keamanan yang kompleks dan baru?</label>
                        <select class="form-select" id="create_k3" name="k3" required>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="create_k4" class="form-label">K4: Seberapa baik produk ini dalam mendeteksi dan mencegah serangan keamanan yang kompleks dan baru?</label>
                        <select class="form-select" id="create_k4" name="k4" required>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="create_k5" class="form-label">K5: Seberapa baik produk ini dalam mendeteksi dan mencegah serangan keamanan yang kompleks dan baru?</label>
                        <select class="form-select" id="create_k5" name="k5" required>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
