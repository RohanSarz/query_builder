
@extends('layouts.layout')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-6">Products</h2>

        <form method="GET" action="{{ route('products.index') }}" class="mb-6 flex items-center space-x-2">
            <input type="text" name="search" placeholder="Search by ID or Description" value="{{ request('search') }}"
                class="input input-bordered w-1/3">
            <button type="submit" class="btn">Search</button>
        </form>

        <div class="mb-4">
            <a href="{{ route('products.index', ['sort' => 'name', 'order' => 'asc']) }}" class="link">Sort by Name
                Ascending</a> |
            <a href="{{ route('products.index', ['sort' => 'name', 'order' => 'desc']) }}" class="link">Sort by
                Name Desending</a> |
            <a href="{{ route('products.index', ['sort' => 'price', 'order' => 'asc']) }}" class="link">Sort by
                Price Ascending</a>|
            <a href="{{ route('products.index', ['sort' => 'price', 'order' => 'desc']) }}" class="link">Sort by
                Price Decending</a>
        </div>

        <table class="table table-zebra table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->product_id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td><img src="{{ asset($product->image) }}" alt="Imaage here" width="100"></td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View</a> |
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success">Edit</a> |
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        
        <button class="btn mt-4"> <a href="{{ route('products.create') }}">Create New Product</a></button>
        
        
    {{ $products->links() }}
    </div>
@endsection
