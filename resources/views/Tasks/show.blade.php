@extends('layouts.app_modern')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Detail Task</h1>

        <!-- Detail Task -->
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $task->title }}</h3>
                <p class="card-text"><strong>Deskripsi: </strong>{{ $task->description }}</p>
                <p class="card-text"><strong>Status: </strong>{{ $task->status }}</p>
                <p class="card-text"><strong>Tanggal Jatuh Tempo: </strong>{{ $task->due_date }}</p>

                <!-- Tombol Aksi -->
                <div class="mt-4">
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
