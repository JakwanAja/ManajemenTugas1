@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Selamat Datang di Aplikasi Manajemen Tugas</h2>
                        <p>by Dzakwan Alfaris</p>
                    </div>
                    <div class="card-body">
                        <h1>Daftar Tugas</h1>
                        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Tambahkan Tugas</a>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <table class="table table-striped table-bordered">
                            <thead>
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
                                        <td>{{ $task->status }}</td>
                                        <td>{{ $task->due_date }}</td>
                                        <td>
                                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">Detail</a>
                                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection