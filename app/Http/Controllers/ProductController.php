<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        // return view('backend.pages.products.index');
    return view('backend.pages.products.index', compact('products'))->with('i', (request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
        'product_name' => 'required',
        'product_barcode' => 'required|integer',
        'product_qty' => 'required|integer',
        'product_price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
        'product_category' => 'required'
        ];

        $message = [
            'required' => 'จำเป็นต้องกรอก :attreibute',
            'integer' => 'ตัวเลขเท่านั้น',
            'regex' => 'กรอกเป็นตัวเลข'
        ];

        $validator = Validator::make($request->all(),$rules,$message);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $product_data = array(
                'product_name' => $request->product_name,
                'product_detail' => $request->product_detail,
                'product_barcode' => $request->product_barcode,
                'product_qty' => $request->product_qty,
                'product_price' => $request->product_price,
                'product_category' => $request->product_category,
                'product_status' => $request->product_status
            );

            Product::create($product_data);
            $message = 'Insert "'.$request->product_name.'" Success !';
            return redirect()->route('products.create')->with('success',$message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.pages.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     * แสดงข้อมูลที่ต้องการอัพเดท
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
    return view('backend.pages.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     * อัพเดทข้อมูลจาก Form
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
        'product_name' => 'required',
        'product_barcode' => 'required|integer',
        'product_qty' => 'required|integer',
        'product_price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
        'product_category' => 'required'
        ];
        
        $message = [
        'required' => 'จำเป็นต้องกรอก :attreibute',
        'integer' => 'ตัวเลขเท่านั้น',
        'regex' => 'กรอกเป็นตัวเลข',
        'size' => 'ความยาวไม่เกิน :size ตัว',
        'digits' => 'จำนวนไม่เกิน :digits หลัก'
        ];
        
        $validator = Validator::make($request->all(),$rules,$message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $product->update($request->all());
            $message = 'แก้ไขข้อมูล "'.$product->product_name.'" เรียบร้อย';
            return redirect()->route('products.index')->with('success',$message);        
        }
        
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $message = 'ข้อมูล "'.$product->product_name.'" ถูกลบเรียบร้อย';
        return redirect()->route('products.index')->with('success',$message);
    }
}