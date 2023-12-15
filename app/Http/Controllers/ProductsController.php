<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\sections;
use App\Models\User;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $sections=sections::all();
      $products=Product::all();
      return view('dashboard.products.products',compact('sections','products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name'=>'required',
            'description'=>'required|min:23|max:111',
            'section_id'=>'required'
        ],[
        'product_name.required'=>'يرجى ادخال اسم المنتج',
        'description'=>'يرجى ادخال الوصف',
        ]);
        Product::create([

            'product_name'=>$request->product_name,
            'description'=>$request->description,
            'section_id'=>$request->section_id,
           // database  =>   form


        ]);
        session()->flash('Add',"تمت العملية بنجاح");
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sections=sections::all();
        $products=Product::all();
        return view('dashboard.products.products_details',compact('sections','products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id=$request->id;
        $product=$request->validate([
         'product_name'=>'required',
             'description'=>'required|min:11|max:177',

        ],[
         'section_name.required'=>'يرجى ادخال اسم القسم',

         'description.required'=>'يرجى ادخال الوصف',
         'description.min'=>'الوصف يجب ان يكون على الاقل احد عشر رقما',
         'description.max'=>'الوصف على الاكثر يجب ان يكون مائة وسبع وسبعون حرفا',
        ]);
      $product=sections::find($id);
       $product->update([
 'product_name'=>$request->section_name,
 'description'=>$request->description,
 'section_id'=>$request->section_id,
        ]);
 session()->flash('Edit','تم التعديل بنجاح');
 return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
       $id=$request->id;
       $product=Product::findorfail($id);
       $product->delete();
       session()->flash('Delete','تم الحذف بنجاح');
       return redirect('/products');
    }
}
