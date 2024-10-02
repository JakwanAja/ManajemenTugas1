@extends('layouts.app')

@section('content')
    <h1>Tambah Task</h1>

    <!-- Tampilkan error jika ada -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Judul:</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="due_date">Jatuh Tempo:</label>
            <input type="date" name="due_date" class="form-control" id="due_date" required>
        </div>

        <div class="form-group">
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" class="form-control" id="user_id" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Task</button>
    </form>
@endsection
