@extends('layouts.app')

@section('content')
    <h1>Buat Task Baru</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>
        <div class="form-group">
            <label for="due_date">Tanggal Jatuh Tempo</label>
            <input type="date" name="due_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="number" name="user_id" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
