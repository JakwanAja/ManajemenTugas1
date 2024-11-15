@extends('layouts.app_modern')

@section('content')
    @auth
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header text-black">
                            <h2 class="mb-0">Data Kategori</h2>
                        </div>

                        <div class="card-body">
                            <h3 class="card-title">Daftar Kategori</h3>

                            <div class="d-flex justify-content-between mb-3">
                                <a href="{{ route('categories.create') }}" class="btn btn-success">
                                    <i class="bi bi-plus-circle"></i> Tambahkan Kategori
                                </a>
                                @if (session('success'))
                                    <div class="alert alert-success w-50" id="success-alert">{{ session('success') }}</div>
                                @endif
                            </div>

                            <table class="table table-hover table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Slug</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info btn-sm">
                                                    <i class="bi bi-eye"></i> Detail
                                                </a>
                                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
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

                            <div class="d-flex justify-content-center mt-4">
                                {{ $categories->links() }} <!-- Menampilkan navigasi paginasi -->
                            </div>
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
