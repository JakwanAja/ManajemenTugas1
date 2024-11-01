@extends('layouts.app')

@section('content')
    <h1>Categories</h1>
    <ul>
        @foreach($categories as $category)
            <li>
                <a href="{{ route('categories.tasks.index', $category) }}">{{ $category->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection