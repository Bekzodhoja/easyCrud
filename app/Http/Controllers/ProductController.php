<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
       $products= Product::all();
       return view('welcome',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'quantity'=>'required',
            'image'=>'required',
        ]);
        if($request->hasFile('image')){
            $name=$request->file('image')->getClientOriginalName();
            $path=$request->file('image')->storeAs('images',$name);
        }
        $product= Product::create([
            'name'=>$request->name,
            'quantity'=>$request->quantity,
            'image'=> $path?? null

        ]);
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product=Product::find($id);
    
        return view('show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product=Product::find($id);
        return view('edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

   
        if($request->hasFile('image'))
        {
        

            if(isset($product->photo)){
                Storage::delete($product->image);
            }

            $name=$request->file('image')->getClientOriginalName();
            $path=$request->file('image')->storeAs('images',$name);
        }
  
        $product->update([
            'name'=>$request->name ?? $product->getOriginal('name'),
            'quantity'=>$request->quantity ?? $product->getOriginal('quantity'),
            'image'=>$path ?? $product->image
        ]);
        $product->save();
        return redirect()->to(route('product.index',$product->id));
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product =  Product::find($product->id);
        $product->delete();
        if($product->image){
            Storage::delete($product->image);
        }
        return redirect()->back();
    }
}
