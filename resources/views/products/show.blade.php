{{-- resources/views/products/show.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>{{ $product->name }}</h1>
    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-fluid">
    <p>{{ $product->description }}</p>
    <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection