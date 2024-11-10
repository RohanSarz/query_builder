<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where('product_id', 'like', '%' . $request->search . '%')->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('sort')) {
            $sort = $request->sort;
            $order = $request->order ?? 'asc';
            $query->orderBy($sort, $order);
        }

        $products = $query->paginate(5);

        return view('index', compact('products'));
    }


    public function create()
    {

        return view('create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|string|unique:products,product_id',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'nullable|integer',
            'image' => 'nullable',
        ]);

        // Check if image is detected
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = "images/$imageName";

            $image->move(public_path('images'), $imageName);
        }

        // Now create the Product
        Product::create([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath ?? null,
        ]);

        return redirect()->route('products.index');
    }


    public function show($id)
    {
        $product = Product::find($id);

        return view('show', compact('product'));
    }


    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit', compact('product'));
    }



    public function update(Request $request, $id)
    {
        // dd($id);
        try{
            $request->validate([
                'product_id' => 'required|string|unique:products,product_id,' . $id,
                'name' => 'required|string',
                'description' => 'nullable|string',
                'price' => 'required|numeric',
                'stock' => 'nullable',
                'image' => 'nullable',
            ]);
    
            $product = Product::findOrFail($id);
    
            if ($request->hasFile('image')) {
    
                unlink($product->image);
    
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = "images/$imageName";
    
                $image->move(public_path('images'), $imageName);
    
                $product->update([
                    'name' => $request->input('name'),
                    'product_id' => $request->input('product_id'),
                    'description' => $request->input('description'),
                    'price' => $request->input('price'),
                    'stock' => $request->input('stock'),
                    'image' => $imagePath
                ]);
            } else {
                $product->update([
                    'name' => $request->input('name'),
                    'product_id' => $request->input('product_id'),
                    'description' => $request->input('description'),
                    'price' => $request->input('price'),
                    'stock' => $request->input('stock'),
    
                ]);
            }
    
            // Find the product and update it
    
    
            // Redirect to a desired route or view, e.g., a product list or detail page
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            // Handle the exception, e.g., display an error message
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }








    public function destroy($id)
    {

        $product = Product::where('id', $id)->first();
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
