<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function productList()
    {
        $products = Product::all();

        return view('products', compact('products'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|max:255',
            'description' => 'required|max:250',
            'picture' => 'required',
            'quantity' => 'required',
        ]);
        $product = new product;

        $product->title = $request['title'];
        $product->price = $request['price'];
        $product->description = $request['description'];
        $product->picture = $request['picture']->hashName();
        $request->file('picture')->store('pictures', 'public');
        $product->quantity = $request['quantity'];

        $product->save();
        return redirect()->route('product.index', ['product' => $product->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|max:255',
            'description' => 'required|max:250',
            'picture' => 'required',
            'quantity' => 'required',
        ]);

        if(empty($request->file('picture')))
        {
            $product->title=$validated['title'];
            $product->price=$validated['price'];
            $product->description=$validated['description'];
            $product->picture=$validated['picture'];
            $product->quantity=$validated['quantity'];
            $product->save();
            return redirect()->route('product.show', ['product' => $product->id]);
        }

            else
            {
                $path = public_path('products_pictures/'.$product->picture);
                if(file_exists($path))
                {
                    unlink($path);
                }
                $pathimage=$request->file('picture') -> getClientOriginalName();
                $pathimage=date("Y-m-d_H:i:s") . $pathimage;

                $validated['picture']=$pathimage;
                $product->title=$validated['title'];
                $product->price=$validated['price'];
                $product->description=$validated['description'];
                $product->picture=$validated['picture'];
                $product->quantity=$validated['quantity'];
                $product->save();
                return redirect()->route('product.show', ['product' => $product->id]);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $path = public_path('products_pictures/'.$product->picture);
        if(file_exists($path)){
            unlink($path);
        }
        $product->delete();
        return redirect()->route('product.index');
    }
}

