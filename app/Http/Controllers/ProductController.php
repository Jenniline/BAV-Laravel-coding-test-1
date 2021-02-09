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
    public function index(Request $request)
    {
        if( $request->get('category') ) {
            $category_name = $request->get('category');
            $category_id = Category::where('name',$category_name)->value('id');     
            $products = Product::where('category_id','=',$category_id)
                                                ->get();
            return view('enproduct.product_card')
               ->with('products', $products);  
        }
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
            'image.*' => 'image|mimes:jpg,png,jpeg',
        ]);
           
        $product = new Product;
        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->category_id = $request->category_id;
        $product->save();

        $input = $request->file();

        $images = $input['image'];

        $path = $request->file('image')->store('public/productImages');
        $exploded_string = explode("public", $path);
        $product->image = asset("storage" . $exploded_string[1]);
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
        $product=Product::find($id);
        return view('enproduct.show-product')->with('product', $product);
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
        return view('enproduct.edit-product')->with('product', $product)
                                            ->with('categories', $categories);
        // return view ('enproduct.create-product', ['categories' => $categories, ]);
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
        $this->validate($request,[
            'product_name' => 'required|min:3|max:20',
            'product_description' => 'required|min:5|max:100',
            'product_price' => 'required',
            'category_id' => 'required',
            // 'images' => 'required|array',
            'product_image.*' => 'image|mimes:jpg,png,jpeg',
        ]);

        $product = Product::find($id);
        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->category_id = $request->category_id;
        $product->save();
         
        if($request->hasFile('images')){
            $images = $request->file('images');
            $image_details = array();
            foreach ($images as $image ) {
                $path = $image->store('public/itemImages');
                $exploded_string = explode("/",$path);
                $image_details[] = new ProductImage (
                [
                    'name' => $exploded_string[2], 
                    'path' => "storage/{$exploded_string[1]}",  
                    'url' => asset("storage/{$exploded_string[1]}/{$exploded_string[2]}")
                ]
             );
            }
            $product->images()->saveMany($image_details);
        }
            
        return response()->json([
            "success"=>true,
            "message"=>"Product updated successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product->delete();

        return response()->json([
            "success" => false,
            "message"  => "Product deleted, product_images and orders,that are associated with this product have also been deleted",
        ], 200);
    }
}
