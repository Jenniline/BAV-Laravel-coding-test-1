<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;



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
            'product_name' => 'required|min:3|max:20',
            'product_description' => 'required|min:5|max:100',
            'product_price' => 'required',
            'category_id' => 'required',
            // 'images' => 'required|array',
            'product_image.*' => 'image|mimes:jpg,png,jpeg',
        ]);
           

        $product = new Product;
        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->category_id = $request->category_id;
        $product->save();

        // $input = $request->file();

        // $image = $input['product_image'];

        $input = $request->file('product_image');
        $path = $request->file('product_image')->store('public/categoryImages');
        $exploded_string = explode("public",$path);
        $product->image = asset("storage".$exploded_string[1]);
        $product->save();

       return redirect()->route('homepage')->with('product',$product);
        
        
        
        

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
