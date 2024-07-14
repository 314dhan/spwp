@extends('layout.header')

@section('content')
<div class="container">
    <h1>Skala</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
        Create Skala
    </button>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Skala</th>
                <th>Nilai Skala</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($skalas as $skala)
            <tr>
                <td>{{ $skala->id }}</td>
                <td>{{ $skala->nama_skala }}</td>
                <td>{{ $skala->nilai_skala }}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $skala->id }}">
                        Edit
                    </button>
                    <form action="{{ route('skala.destroy', $skala->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <!-- Modal Edit -->
            <div class="modal fade" id="editModal{{ $skala->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $skala->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $skala->id }}">Edit Skala</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form Edit -->
                            <form action="{{ route('skala.update', $skala->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="edit_nama_skala{{ $skala->id }}" class="form-label">Nama Skala</label>
                                    <input type="text" class="form-control" id="edit_nama_skala{{ $skala->id }}" name="nama_skala" value="{{ $skala->nama_skala }}">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_nilai_skala{{ $skala->id }}" class="form-label">Nilai Skala</label>
                                    <input type="text" class="form-control" id="edit_nilai_skala{{ $skala->id }}" name="nilai_skala" value="{{ $skala->nilai_skala }}">
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
                <h5 class="modal-title" id="createModalLabel">Create Skala</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Create -->
                <form action="{{ route('skala.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="create_nama_skala" class="form-label">Nama Skala</label>
                        <input type="text" class="form-control" id="create_nama_skala" name="nama_skala">
                    </div>
                    <div class="mb-3">
                        <label for="create_nilai_skala" class="form-label">Nilai Skala</label>
                        <input type="text" class="form-control" id="create_nilai_skala" name="nilai_skala">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
