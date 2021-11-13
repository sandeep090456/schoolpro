<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NotebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $notebooks = DB::table('notebooks')
         ->join('brands','notebooks.brand_id','=','brands.id')
         ->select('notebooks.id','brands.brand_name','notebooks.specification')
         ->get();
         // $notebooks = Notebook::paginate(5);
         return view('notebook.index',compact('notebooks'));
        // ->with('i',(request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notebook.create');
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
            'brand_id'=>'required',
            'specification'=>'required',
        ]);

        Notebook::create($request->all());
        return redirect()->route('notebook.index')
        ->with('success','Details added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Http\Response
     */
    public function show(Notebook $notebook)
    {
        return view('notebook.show',compact('notebook'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Notebook $notebook)
    {
        return view('notebook.edit',compact('notebook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notebook $notebook)
    {
        $request->validate([

        ]);

        $notebook->update($request->all());
        return redirect()->route('notebook.index')
        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notebook $notebook)
    {
        $notebook->delete();
        return redirect()->route('notebook.index')
        ->with('success','Deleted successfully');
    }
}
