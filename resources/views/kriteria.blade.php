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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kriterias as $kriteria)
            <tr>
                <td>{{ $kriteria->id }}</td>
                <td>{{ $kriteria->nama_kriteria }}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $kriteria->id }}">
                        Edit
                    </button>
                    <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <!-- Modal Edit -->
            <div class="modal fade" id="editModal{{ $kriteria->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $kriteria->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $kriteria->id }}">Edit Kriteria</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form Edit -->
                            <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="edit_nama_kriteria{{ $kriteria->id }}" class="form-label">Nama Kriteria</label>
                                    <input type="text" class="form-control" id="edit_nama_kriteria{{ $kriteria->id }}" name="nama_kriteria" value="{{ $kriteria->nama_kriteria }}">
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
                        <label for="create_nama_kriteria" class="form-label">Nama Kriteria</label>
                        <input type="text" class="form-control" id="create_nama_kriteria" name="nama_kriteria">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
