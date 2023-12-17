<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use App\Models\Product;
use App\Models\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $invoices= invoices::all();
      $sections=sections::all();
      $products=Product::all();
      return view('dashboard.invoices.invoices',compact('invoices','sections','products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections=sections::all();

return view('dashboard.invoices.add_invoices',compact('sections'));
// session()->flash('Add','تم اضافة الفاتورة بنجاح');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

// $data=$request->validate([
//     'invoice_number'=>'required',
// 'invoice_Date'=>'required|date',
// 'Due_date'=>'required|date',
// 'Section'=>'required',
// 'product'=>'required',
// 'Amount_collection'=>'required',
// 'Amount_Commission'=>'required',
// 'Discount'=>'required',
// 'Rate_VAT'=>'required',
// 'Value_VAT'=>'required',
// 'Total'=>'required',
// 'note'=>'string',
// 'pic'=>''

// ]);
invoices::create([


    'invoice_number' => $request->invoice_number,
    'invoice_Date' => $request->invoice_Date,
    'Due_date' => $request->Due_date,
    'product' => $request->product,
    'section_id' => $request->Section,
    // 'Amount_collection' => $request->Amount_collection,
    'Amount_Commission' => $request->Amount_Commission,
    'Discount' => $request->Discount,
    'Value_VAT' => $request->Value_VAT,
    'Rate_VAT' => $request->Rate_VAT,
    'Total' => $request->Total,
    // 'Status' => 'غير مدفوعة',
    // 'Value_Status' => 2,
    'note' => $request->note,
    //database=>form
]);
return view('dashboard.invoices.invoices');
//return response('welcome');

    }

    /**
     * Display the specified resource.
     */
    public function show(invoices $invoices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(invoices $invoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, invoices $invoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(invoices $invoices)
    {
        //
    }

    public function getproducts($id){
$products=DB::table('products')->where('section_id',$id)->pluck('product_name','id');//pluck يعنى هاتهم
return json_encode($products);
    }
}
