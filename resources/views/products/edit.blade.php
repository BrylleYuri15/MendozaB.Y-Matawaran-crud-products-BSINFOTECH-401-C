{{-- resources/views/products/edit.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ asset('storage/' . $product->image) }}" alt="Current Image" class="img-thumbnail mt-2">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection

