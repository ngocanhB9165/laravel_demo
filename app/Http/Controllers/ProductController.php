<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Product;
Use App\Models\Category;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
            $products = Product::search()->paginate(3)->withQueryString();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->where('status',1);
        return view('admin.product.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->hasFile('file')){
            $file = $request->file;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads'),$file_name);
       };
       try {
         $request->merge(['image'=>$file_name]);
         Product::create($request->all());
         
         return redirect()->route('product.index')->with('success','Thêm mới thành công');
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
        $products = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit',compact('products','categories'));
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
        $products = Product::find($id);
        if($request->has('file')){
            $file = $request->file;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads'),$file_name);
        }else{
            $file_name = $products->image;
        }
        try {
            $request->merge(['image'=>$file_name]);
            $products->update($request->all());
            return redirect()->route('product.index')->with('success','Sửa thành công');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        if($products->delete()){
            return redirect()->route('product.index')->with('success','Xóa thành công');
        }
    }
    public function cabin()
    {
        $products = Product::onlyTrashed()->orderByDesc('id')->paginate(3);
        return view('admin.product.softdelete',compact('products'));
    }
    public function restore($id)
    {
        try {
            Product::withTrashed()->find($id)->restore();
            return redirect()->route('product.index')->with('success','Khôi phục thành công');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
