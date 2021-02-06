<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        //Parent Path
        $this->path = "dashboard.sub_categories.";

        //Permissions
        $this->middleware('permission:read_sub_categories')->only(['index']);
        $this->middleware('permission:create_sub_categories')->only(['create','store']);
        $this->middleware('permission:update_sub_categories')->only(['edit','update']);
        $this->middleware('permission:delete_sub_categories')->only(['destroy']);

    }

    public function index()
    {
       $subCategories = SubCategory::WhenSearch(request()->search)
           ->with('category')
           ->paginate(5);
        return view($this->path.'index',compact('subCategories'));
    }//end of index

    public function create()
    {
        $categories = Category::all();
        return view($this->path.'create',compact('categories'));
    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sub_categories,name',
            'category_id' => 'required|numeric'
        ]);
        SubCategory::create($request->all());
        session()->flash('success',__('site.DataAddSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of store

    public function edit(SubCategory $subCategory)
    {
        $categories = Category::all();
        return view($this->path.'create',compact('categories','subCategory'));
    }//end of edit

    public function update(Request $request, SubCategory $subCategory)
    {
        $request->validate([
            'name' => 'required|unique:sub_categories,name,'.$subCategory->id,
        ]);
        $subCategory->update($request->all());
        session()->flash('success',__('site.DataUpdatedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of update

    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        session()->flash('success',__('site.DataDeletedSuccessfully'));
        return redirect()->route($this->path.'index');
    }//end of destroy
}
