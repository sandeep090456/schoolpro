<?php

namespace App\Http\Controllers;
use App\Models\School;
use App\Models\Subject;
use App\Models\Standard;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index',compact('products'))
        ->with('i',(request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('products.create');

        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'school_name'=>'required',
            'class'=>'required',
            'subject'=>'required',
            'book_name'=>'required',
            'publisher'=>'required',
            'book_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hsn'=>'required',
            'gst'=>'required',
            'price'=>'required',
        ]);
        $path = $request->file('book_image')->store('public/images');
        $product = new Product();
        $product->school_name = $request->school_name;
        $product->class = $request->class;
        $product->subject = $request->subject;
        $product->book_name = $request->book_name;
        $product->publisher = $request->publisher;
        $product->hsn = $request->hsn;
        $product->gst = $request->gst;
        $product->price = $request->price;
        $product->book_image = $path;
        $product->save();
        return redirect()->route('products.index')
        ->with('success','Product added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
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
        $request->validate([
            'school_name'=>'required',
            'class'=>'required',
            'subject'=>'required',
            'book_name'=>'required',
            'publisher'=>'required',
            'hsn'=>'required',
            'gst'=>'required',
            'price'=>'required',
        ]);
        $product = new Product();
        if($request->hasFile('book_image')){
            $request->validate([
              'book_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('book_image')->store('public/images');
            $product->book_image = $path;
        }
        $product->school_name = $request->school_name;
        $product->class = $request->class;
        $product->subject = $request->subject;
        $product->book_name = $request->book_name;
        $product->publisher = $request->publisher;
        $product->hsn = $request->hsn;
        $product->gst = $request->gst;
        $product->price = $request->price;
        $product->save();
        return redirect()->route('products.index')
        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
        ->with('success','Product deleted successfully');
    }
}
