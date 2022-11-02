<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index', ['products'=>Product::all()]);
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
    public function store(Request $request){
        $images = json_decode($request->images);
        $slug = Str::slug(Str::lower($request->title), '-');

        $metadata = [];
        foreach(json_decode($request->metadata) as $data){
            if($data->key && $data->value){
                $metadata[] = $data;
            }
        }

        $name = Str::title($request->title);

        $query_titles = Product::where('name', '=', $name)->get();
        if(count($query_titles)){

            if(count($query_titles) == 1){
                $slug = $slug.'-1';
            } else {
                $query_titles_frags = explode('-', $query_titles[count($query_titles) - 1]->slug);
                $num = intval($query_titles_frags[count($query_titles_frags) - 1]);
                $num++;
                $slug = $slug.'-'.$num;
            }
        }

        $description = $request->description;
        $price = $request->price;

        $category = Category::firstOrCreate([
            'name' => Str::title($request->category),
            'slug' => Str::slug(Str::lower($request->category), '-')
        ]);

        $data = [
            'name' => $name,
            'category_id' => $category->id,
            'description' => $description,
            'slug' => $slug,
            'price' => $price,
            'images' => $images,
            'metadata' => $metadata,
        ];


        $product = Product::create($data);
        if($product)
            return response()->json($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
