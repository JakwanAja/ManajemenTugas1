@extends('layouts.app_modern')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Detail Kategori</h1>

        <!-- Detail Kategori -->
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $category->name }}</h3>
                <p class="card-text"><strong>Slug: </strong>{{ $category->slug }}</p>
                <p class="card-text"><strong>Deskripsi: </strong>{{ $category->description }}</p>

                <!-- Tombol Aksi -->
                <div class="mt-4">
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
