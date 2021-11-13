<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Specification;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = DB::table('projects')
         ->join('brands','projects.brand_id','=','brands.id')
         ->join('specifications','projects.specification_id','=','specifications.id')
         ->select('projects.id','brands.brand_name','specifications.spec_name','projects.pages')
         ->get();
         $project = Project::all();
         return view('project.index',compact('projects'));
         //->with('i',(request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$data['brand'] = Brand::get(["brand_name", "id"]);
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData =  $request->validate([
            'brand_id'=>'required',
            'specification_id'=>'required',
            'pages'=>'required',
        ]);

        $project = Project::create($storeData);

        return redirect()->route('project.index')
        ->with('success','Details added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findorFail($id);
        return view('project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'brand_id'=>'required',
            'specification_id'=>'required',
            'pages'=>'required',
        ]);

        Project::whereId($id)->update($updateData);
        return redirect()->route('project.index')
        ->with('success','Details updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findorFail($id);
        $project->delete();

        return redirect()->route('project.index')
        ->with('success','Deleted successfully');
    }
    
}
