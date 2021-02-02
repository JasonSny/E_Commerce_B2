<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class gameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(6);

        return view('admin.products.index',[
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
        $categories = Category::all();
        return view('admin.products.create', ['category' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newProduct = new Product();
        $newProduct->title = $request->title;
        $newProduct->slug = $request->slug;
        $newProduct->subtitle = $request->subtitle;
        $newProduct->description = $request->description;
        $newProduct->price = $request->price;
        $newProduct->stock = $request->stock;

        $file = $request->file('image');
        $newProduct->image = '/images/' . $file->getClientOriginalName();
        $file->move(public_path('\images'), $file->getClientOriginalName());

        $newProduct->save();

        return redirect(route('admin.products.index', ['product' => $newProduct]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit', ['product' => $product, 'category' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $updateProduct = Product::find($product->id);
        $updateProduct->title = $request->title;
        $updateProduct->slug = $request->slug;
        $updateProduct->subtitle = $request->subtitle;
        $updateProduct->price = $request->price;
        $updateProduct->stock = $request->stock;
        $updateProduct->description = $request->description;

        if ($request->hasFile('image')){
            print_r('file');
            $file = $request->file('image');
            $updateProduct->image = '/images/' . $file->getClientOriginalName();
            $file->move(public_path('\images'), $file->getClientOriginalName());
        }else{
            print_r('Ne fonctionne pas');
        }


        $updateProduct->save();

        return redirect(route('products.index', ['product' => $updateProduct]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();
        return redirect(route('admin.products.index'));
    }
    
}
