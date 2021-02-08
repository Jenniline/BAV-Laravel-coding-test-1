<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('encategory.category_card')
                ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('encategory.create-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'category_name' => 'required|min:3|max:20',
            'image' => 'required'
        ));

         $category = new Category;
         $category->name = $request->category_name;

         $input = $request->file();

        //  $images = $input['image'];
 
         $path = $request->file('image')->store('public/categoryImages');
         $exploded_string = explode("public",$path);
         $category->image = asset("storage".$exploded_string[1]);
         $category->save();

        return redirect()->route('homepage')->with('category',$category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::find($id);
        return view('encategory.show-category')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        //return the view 
        return view('encategory.edit-category')->with('category', $category);
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
        $this->validate($request, array(
            'category_name' =>'required|min:3|max:20',
            'image' => 'image|mimes:jpeg,jpg,png'
        ));

        $category = Category::find($id); 
        $category->name = $request->category_name; 

        if($request->hasFile('image')){

            $categoryArray = explode('/categoryImages/', $category->url);
            $oldPath = storage_path("app/public/categoryImages/" . end($categoryArray));
            $path = $request->file('image')->store('public/categoryImages'); 
            $exploded_string = explode("public",$path);
            $category->url = asset("storage".$exploded_string[1]);
            $category->save();

            @unlink($oldPath);
        } else {
            $category->save(); 
        }

        // Session::flash('success','The blog post was succesfully saved!');

        // redirect to another page 
        return redirect()->route('show-category', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $products = Product::where('category_id', $id)->get();

        // if (sizeof($products) > 0) {
            
        //     return response()->json([
        //         "success" => false,
        //         "message"  => "Category cannot be deleted it is associated with products",
        //     ],400);
        // }
        
        // $category = Category::findOrFail($id);
        // $categoryImgUrl = $category->url; 

        $category = Category::find($id);

        $category->delete();

        // $categoryArray = explode('/categoryImages/', $categoryImgUrl);
        // $oldPath = storage_path("app/public/categoryImages/" . end($categoryArray));
        // @unlink($oldPath);

        // Session::flash('success','The blog post was succesfully saved!');

        // redirect to another page 
        return redirect()->route('homepage', $category->id);
     
    }
}
