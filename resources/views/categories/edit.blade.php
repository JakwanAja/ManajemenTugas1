@extends('layouts.app_modern')

@section('content')
    <h1>Ubah Kategori</h1>

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

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Menggunakan PUT karena kita akan mengupdate data -->

        <div class="form-group">
            <label for="name">Nama Kategori:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $category->name) }}" required>
        </div>

        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug', $category->slug) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea name="description" class="form-control" id="description" rows="3">{{ old('description', $category->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Kategori</button>
    </form>
@endsection