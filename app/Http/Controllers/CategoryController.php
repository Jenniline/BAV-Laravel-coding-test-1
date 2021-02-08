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
            'image' => 'required|image|mimes:jpeg,jpg,png'
        ));

         //saving the category
         $category = new Category;
         $category->name = $request->name;
 
         $input = $request->file();
 
         $images = $input['image'];
 
         $path = $request->file('image')->store('public/categoryImages');
         $exploded_string = explode("public",$path);
         $category->url = asset("storage".$exploded_string[1]);
         $category->save();

             // Session and flash message initilaization put for something permanent in the session 
        Session::flash('success','The category was succesfully saved!');

        // redirect to another page 
        return redirect()->route('homepage', $category->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //to view a specific post 
         $category=Category::find($id);
         //  return view('posts.show')->withPosts('',$post);
         return view('show-category.show')->withCategory($category);

         return $category;

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
        return view('edit-category.edit')->withCategory($category);
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
        $category->name = $request->name; 

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

        Session::flash('success','The blog post was succesfully saved!');

        // redirect to another page 
        return redirect()->route('homepage', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::where('category_id', $id)->get();

        if (sizeof($products) > 0) {
            
            return response()->json([
                "success" => false,
                "message"  => "Category cannot be deleted it is associated with products",
            ],400);
        }
        
        $category = Category::findOrFail($id);
        $categoryImgUrl = $category->url; 

        $category->delete();

        $categoryArray = explode('/categoryImages/', $categoryImgUrl);
        $oldPath = storage_path("app/public/categoryImages/" . end($categoryArray));
        @unlink($oldPath);

        Session::flash('success','The blog post was succesfully saved!');

        // redirect to another page 
        return redirect()->route('homepage', $category->id);
     
    }
}
