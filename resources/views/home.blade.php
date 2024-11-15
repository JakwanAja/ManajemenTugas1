@extends('layouts.app_modern')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                </div>
            </div>
        </div>
    </div>
    
   <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8 mx-auto">
                    <div class="jumbotron bg-light shadow">
                        <h1 class="display-4 text-primary">Selamat Datang di Aplikasi Task Manager</h1>
                        <p class="lead">Aplikasi ini dibuat menggunakan Framework Laravel dan dibuat untuk memudahkan Pengelolaan Tugas berdasarkan Kategori.</p>
                        <hr class="my-4">
                        <p class="text-muted">Dibuat oleh Dzakwan Alfaris sebagai bagian dari Tugas mata kuliah Pemrograman Berbasis Web II</p>
                        <p class="text-muted">Terakhir diupdate pada 15 November 2024</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.container-fluid -->
</div>
@endsection
