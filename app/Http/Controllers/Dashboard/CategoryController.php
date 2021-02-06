<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function __construct()
         {
             //Parent Path
             $this->path = "dashboard.categories.";

             //Permissions
            $this->middleware('permission:read_categories')->only(['index']);
            $this->middleware('permission:create_categories')->only(['create','store']);
            $this->middleware('permission:update_categories')->only(['edit','update']);
            $this->middleware('permission:delete_categories')->only(['destroy']);

         }

          public function index()
          {
              $categories = Category::WhenSearch(request()->search)->paginate(8);
              return view($this->path.'index',compact('categories'));
          }//end of index

          public function create()
          {
               return view($this->path.'create');
          }//end of create

          public function store(Request $request)
          {
              $request->validate([
                  'category_name' => 'required|unique:categories,category_name',
              ]);
              Category::create($request->all());
              session()->flash('success',__('site.DataAddSuccessfully'));
              return redirect()->route($this->path.'index');
          }//end of store

          public function show($id)
          {
              //
          }//end of show

          public function edit(Category $category)
          {
               return view($this->path.'create',compact('category'));
          }//end of edit

          public function update(Request $request, Category $category)
          {
              $request->validate([
                  'category_name' => 'required|unique:categories,category_name,'.$category->id,
              ]);
              $category->update($request->all());
              session()->flash('success',__('site.DataUpdatedSuccessfully'));
              return redirect()->route($this->path.'index');
          }//end of update

          public function destroy(Category $category)
          {
              $category->delete();
              session()->flash('success',__('site.DataDeletedSuccessfully'));
              return redirect()->route($this->path.'index');
          }//end of destroy
}
