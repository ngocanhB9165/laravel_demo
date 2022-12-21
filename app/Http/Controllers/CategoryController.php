<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        
        $categories = Category::orderByDesc('id')->paginate(3);
        // $categories = Category::offset(0)->limit(5)->get();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Category::create($request->all());
            return redirect()->route('category.index')->with('success','Thêm mới thành công');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.category.edit',compact('categories'));
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
        try {
            Category::find($id)->update($request->all());
            return redirect()->route('category.index')->with('success','Sửa thành công');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function cabin()
    {
        $categories = Category::onlyTrashed()->orderByDesc('id')->paginate(3);
        return view('admin.category.softdelete',compact('categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     Category::find($id)->delete();
    //     return redirect()->route('category.index')->with('success','Xóa thành công');
    // }
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.index')->with('success','Xóa thành công');
    }
    public function restore($id)
    {
        try {
            Category::withTrashed()->find($id)->restore();
            return redirect()->route('category.index')->with('success','Khôi phục thành công');
        
        } catch (\Throwable $th) {
            dd($th);
        }
        
    }
    public function restore_all()
    {
        try {
            Category::withTrashed()->restore();
            return redirect()->route('category.index')->with('success','Khôi Phục tất cả thành công');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function delete_all()
    {
        Category::whereNotNull('id')->delete();
        // Category::truncase();
        return redirect()->route('category.index')->with('success','Xóa tất cả thành công');
    }
}
