<?php

namespace App\Http\Controllers;
use App\Models\School;
use App\Models\Subject;
use App\Models\Standard;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        $products = DB::table('products')
         ->join('schools','products.school_id','=','schools.id')
         ->join('standards','products.class_id','=','standards.id')
         ->select('products.id','schools.name','standards.name','products.stream','products.subject','products.book_name','products.publisher','products.hsn','products.gst','products.price',)
         ->get();
        // $product = Product::all();
         return view('products.index',compact('products'))
         ->with('i',(request()->input('product',1) - 1)* 5);
         
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
            'school_id'=>'required',
            'class_id'=>'required',
            'stream'=>'required',
            'subject'=>'required',
            'book_name'=>'required',
            'publisher'=>'required',
            'hsn'=>'required',
            'gst'=>'required',
            'price'=>'required',
        ]);
        // $path = $request->file('book_image')->store('public/images');
        // $product = new Product();
        // $product->school_id = $request->school_id;
        // $product->class_id = $request->class_id;
        // $product->subject = $request->subject;
        // $product->book_name = $request->book_name;
        // $product->publisher = $request->publisher;
        // $product->hsn = $request->hsn;
        // $product->gst = $request->gst;
        // $product->price = $request->price;
        // $product->book_image = $path;
        // $product->save();
            Product::create($request->all());
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'school_id'=>'required',
            'class_id'=>'required',
            'subject'=>'required',
            'book_name'=>'required',
            'publisher'=>'required',
            'hsn'=>'required',
            'gst'=>'required',
            'price'=>'required',
        ]);

        $product = Product::find($id);
        $product->school_id = $request->school_id;
        $product->class_id = $request->class_id;
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
    public function books_list(Request $request)
    {
        $products= Product::where('school_id', $request->school_id)->get();
        return view('products.index',compact('products'))
        ->with('i',(request()->input('page',1) - 1)* 5);
    }
    public function products_list(Request $request)
    {
        $products= Product::where('school_id', $request->school_id)->where('class_id', $request->class_id)->get();
        return view('products.index',compact('products'))
        ->with('i',(request()->input('page',1) - 1)* 5);
    }
}
