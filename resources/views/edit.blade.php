@extends('layouts.layout')

@section('content')
    <div class="container mx-auto p-6 bg-gray-100 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Product</h2>
        
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-gray-700 font-medium">Product ID</label>
                {{--  now i will add the product id but it isnt editable to the user --}}
                
                <input type="text" name="product_id" class="w-full p-2 border text-gray-500 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $product->product_id }}">
                
            </div>
            
            <div>
                <label class="block text-gray-700 font-medium">Name</label>
                <input type="text" name="name" value="{{ $product->name }}"
                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Description</label>
                <textarea name="description"
                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $product->description }}</textarea>
            </div>
            
            <div>
                <label class="block text-gray-700 font-medium">Price</label>
                <input type="decimal" step="0.01" name="price" value="{{ $product->price }}"
                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Stock</label>
                <input type="number" name="stock" value="{{ $product->stock }}"
                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class=" text-center">
                <label class="block text-gray-700 font-medium">Current Image</label>
                
                @if ($product->image)
                <img src="{{ asset( $product->image) }}" width="100" alt="Can't load img"
                class="w-1/3 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 my-2">
                @endif
            </div>
            
            <div>
                <label class="block text-gray-700 font-medium">Update Image</label>
                <input type="file" name="image"
                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <button type="submit"
            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Update</button>
        </form>
        
    </div>
@endsection
