@extends('layouts.app_modern')

@section('content')
    @auth
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header text-black">
                            <h2 class="mb-0">Selamat Datang di Aplikasi Manajemen Tugas</h2>
                        </div>

                        <div class="card-body">
                            <h3 class="card-title">Daftar Tugas</h3>

                            <div class="mb-3">
                                <form action="{{ route('tasks.index') }}" method="GET" class="d-inline">
                                    <label for="statusFilter" class="form-label">Kategori:</label>
                                    <select name="status" id="statusFilter" class="form-select w-auto d-inline" onchange="this.form.submit()">
                                        <option value="all" {{ $selectedStatus == 'all' ? 'selected' : '' }}>Semua</option>
                                        <option value="pending" {{ $selectedStatus == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="in_progress" {{ $selectedStatus == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="completed" {{ $selectedStatus == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </form>
                            </div>

                            <div class="d-flex justify-content-between mb-3">
                                <a href="{{ route('tasks.create') }}" class="btn btn-success">
                                    <i class="bi bi-plus-circle"></i> Tambahkan Tugas
                                </a>
                                @if (session('success'))
                                    <div class="alert alert-success w-50" id="success-alert">{{ session('success') }}</div>
                                @endif
                            </div>

                            <table class="table table-hover table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul</th>
                                        <th>Status</th>
                                        <th>Jatuh Tempo</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td>{{ $task->id }}</td>
                                            <td>{{ $task->title }}</td>
                                            <td>
                                                <span class="badge bg-{{ $task->status == 'completed' ? 'success' : ($task->status == 'in_progress' ? 'warning' : 'secondary') }}">
                                                    {{ ucfirst($task->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $task->due_date }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">
                                                    <i class="bi bi-eye"></i> Detail
                                                </a>
                                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-end mt-3">
                                <a href="#" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Script to auto-hide the success message after 5 seconds
            document.addEventListener('DOMContentLoaded', function () {
                var successAlert = document.getElementById('success-alert');
                if (successAlert) {
                    setTimeout(function () {
                        successAlert.style.display = 'none';
                    }, 5000); // 5000 milliseconds = 5 seconds
                }
            });
        </script>
    @endauth
@endsection
