@extends('layout.header')

@section('content')
<div class="container">
    <h1>Kriteria</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
        Create Kriteria
    </button>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kriteria</th>
                <th>Kepentingan</th>
                <th>Cost/Benefit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kriterias as $kriteria)
            <tr>
                <td>{{ $kriteria->id_kriteria }}</td>
                <td>{{ $kriteria->kriteria }}</td>
                <td>{{ $kriteria->kepentingan }}</td>
                <td>{{ $kriteria->cost_benefit }}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $kriteria->id_kriteria }}">
                        Edit
                    </button>
                    <form action="{{ route('kriteria.destroy', $kriteria->id_kriteria) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <!-- Modal Edit -->
            <div class="modal fade" id="editModal{{ $kriteria->id_kriteria }}" tabindex="-1" aria-labelledby="editModalLabel{{ $kriteria->id_kriteria }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $kriteria->id_kriteria }}">Edit Kriteria</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form Edit -->
                            <form action="{{ route('kriteria.update', $kriteria->id_kriteria) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="edit_kriteria{{ $kriteria->id_kriteria }}" class="form-label">Nama Kriteria</label>
                                    <input type="text" class="form-control" id="edit_kriteria{{ $kriteria->id_kriteria }}" name="kriteria" value="{{ $kriteria->kriteria }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_kepentingan{{ $kriteria->id_kriteria }}" class="form-label">Kepentingan</label>
                                    <select class="form-select" id="edit_kepentingan{{ $kriteria->id_kriteria }}" name="kepentingan" required>
                                        <option value="1" {{ $kriteria->kepentingan == 1 ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $kriteria->kepentingan == 2 ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ $kriteria->kepentingan == 3 ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ $kriteria->kepentingan == 4 ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ $kriteria->kepentingan == 5 ? 'selected' : '' }}>5</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_cost_benefit{{ $kriteria->id_kriteria }}" class="form-label">Cost/Benefit</label>
                                    <select class="form-select" id="edit_cost_benefit{{ $kriteria->id_kriteria }}" name="cost_benefit" required>
                                        <option value="cost" {{ $kriteria->cost_benefit == 'cost' ? 'selected' : '' }}>cost</option>
                                        <option value="benefit" {{ $kriteria->cost_benefit == 'benefit' ? 'selected' : '' }}>benefit</option>
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
                <h5 class="modal-title" id="createModalLabel">Create Kriteria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Create -->
                <form action="{{ route('kriteria.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="create_kriteria" class="form-label">Nama Kriteria</label>
                        <input type="text" class="form-control" id="create_kriteria" name="kriteria" required>
                    </div>
                    <div class="mb-3">
                        <label for="create_kepentingan" class="form-label">Kepentingan</label>
                        <select class="form-select" id="create_kepentingan" name="kepentingan" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="create_cost_benefit" class="form-label">Cost/Benefit</label>
                        <select class="form-select" id="create_cost_benefit" name="cost_benefit" required>
                            <option value="cost">cost</option>
                            <option value="benefit">benefit</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
