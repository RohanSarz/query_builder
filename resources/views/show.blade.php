@extends('layouts.layout', ['classes' => 'bg-base-200'])

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-center text-2xl font-semibold mb-6">Product Details</h2>

        <div class="card w-full bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="flex flex-wrap -mx-4">
                    <div class="w-1/3 px-4">
                        <img class="w-full rounded-md" src="{{ asset( $product->image) }}" alt="Image Here">
                    </div>
                    <div class="w-2/3 px-4 space-y-4">
                        <div class="flex justify-between">
                            <h3 class="text-xl font-semibold">ID:</h3>
                            <span class="text-md">{{ $product->id }}</span>
                        </div>
                        <div class="flex justify-between">
                            <h3 class="text-xl font-semibold">Name:</h3>
                            <span class="text-md">{{ $product->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <h3 class="text-xl font-semibold">Product ID:</h3>
                            <span class="text-md">{{ $product->product_id }}</span>
                        </div>
                        <div class="flex justify-between">
                            <h3 class="text-xl font-semibold">Description:</h3>
                            <span class="text-md">{{ $product->description }}</span>
                        </div>
                        <div class="flex justify-between">
                            <h3 class="text-xl font-semibold">Price:</h3>
                            <span class="text-md">{{ $product->price }}</span>
                        </div>
                        <div class="flex justify-between">
                            <h3 class="text-xl font-semibold">Stock:</h3>
                            <span class="text-md">{{ $product->stock }}</span>
                        </div>
                        <div class="flex justify-between">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('products.index') }}" class="link">Back to Product List</a>
        </div>
    </div>
@endsection

