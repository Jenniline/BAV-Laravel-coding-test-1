<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('enproduct.product_card')
                ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view ('enproduct.create-product', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3|max:20',
            'description' => 'required|min:5|max:100',
            'price' => 'required',
            // 'category_id' => 'required',
            'product_images' => 'required|array',
            'product_images.*' => 'image|mimes:jpg,png,jpeg',
        ]);
         

        $product = new Product;
        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->days = $request->days;
        $product->category_id = $request->category_id;
        $product->save();

        $images = $request->file('product_images');
        $image_details = array();

        foreach ($images as $image) {
            $path = $image->store('public/itemImages');
            $exploded_string = explode("/",$path);
            $image_details[] = new ProductImage (
            [
                'name' => $exploded_string[2], 
                'path' => "public/itemImages",  
                'url' => asset("storage/{$exploded_string[1]}/{$exploded_string[2]}")
            ]
         );
        }
        
        $product->images()->saveMany($image_details);
        
        return response()->json([
            "success"=>true,
            "message"=> "Product stored successfully"
        ], 200);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
