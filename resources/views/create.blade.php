@extends('layouts.layout', ['classes' => 'bg-base-200'])

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-6">Add New Product</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
            class="card w-full bg-base-100 shadow-xl">
            @csrf
            @method('POST')
            <div class="card-body">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Product ID</span>
                    </label>
                    <input type="text" name="product_id" required
                        class="input input-bordered w-full">
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Name</span>
                    </label>
                    <input type="text" name="name" required
                        class="input input-bordered w-full">
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Description</span>
                    </label>
                    <textarea name="description"
                        class="textarea textarea-bordered h-24 w-full"></textarea>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Price</span>
                    </label>
                    <input type="number" step="0.01" name="price" required
                        class="input input-bordered w-full">
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Stock</span>
                    </label>
                    <input type="number" name="stock"
                        class="input input-bordered w-full">
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Image</span>
                    </label>
                    <input type="file" name="image"
                        class="input input-bordered w-full">
                </div>

                <div class="card-actions justify-end">
                    <button type="submit"
                        class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

