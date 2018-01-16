<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except('categoryShow', 'categoryList');
    }


    public function categoryList()
    {
        $categories = Category::all();

        return view('categories.categoryList', ['categories'=>$categories]);
    }


    //CRUD
    public function categoryCreate()
    {
        return view('categories.categoryCreate');
    }

    public function categoryStore(Request $request)
    {
        $this->validate($request, array(
        'name' => 'required|max:200'
    ));

        $category = new Category;

        $category->name = $request->name;

        $category->save();


        Session::flash('success','The category was added!');

        return redirect()->route('categoryList');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryShow($id)
    {
        $category =  Category::find($id);


        return view('categories.categoryShow', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryEdit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryUpdate(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryDestroy($id)
    {
        //
    }
}
