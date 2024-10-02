@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

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

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Judul:</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $task->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea name="description" class="form-control" id="description" rows="3" required>{{ $task->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="due_date">Jatuh Tempo:</label>
            <input type="date" name="due_date" class="form-control" id="due_date" value="{{ $task->due_date }}" required>
        </div>

        <div class="form-group">
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" class="form-control" id="user_id" value="{{ $task->user_id }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
@endsection
