<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::where("user_id", auth()->id());
        $products = Product::where('user_id', auth()->id())->paginate(10); 
        // dd($products);
        return view('products.index', ['products'=> $products]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products= Product::where("user_id", auth()->id())->get(['id', 'name']);
        $categories= Category::where('user_id', auth()->id())->get(['id', 'name']);
        $units      =   Unit::where('user_id', auth()->id())->get(['id', 'name']);


        return view('products.create', [
            'product'   => $products,
            'categories'  =>  $categories,
            'units'      =>  $units,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = "";
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image')->store('products', 'public');
        }

        Product::create([
            "code" => IdGenerator::generate([
                'table' => 'products',
                'field' => 'code',
                'length' => 4,
                'prefix' => 'PC'
            ]),
            'product_image'   => $image,
            'name'          => $request->name,
            'category_id'   =>  $request->category_id,
            'unit_id'       =>  $request->unit_id,
            'buying_price'  =>  $request->buying_price,
            'selling_price' =>  $request->selling_price,
            'quantity'      =>  $request->quantity,
            'quantity_alert'=>  $request->quantity_alert,
            'tax'           =>  $request->tax,
            'tax_type'      =>  $request->tax_type,
            'notes'         =>  $request->notes,
            "user_id" => auth()->id(),
            "slug" => Str::slug($request->name, '-'),
            "uuid" => Str::uuid()
        ]);
        return redirect()->route('products.index')->with('success', 'Product has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show($uuid)
    {
        $products= Product::where("uuid", $uuid)->first();
        // dd($products);
        return view('products.show', ["product"=> $products] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uuid) 
    {
        $products= Product::where("uuid", $uuid)->first();
        $categories= Category::where('user_id', auth()->id())->get();
        $units= Unit::where('user_id', auth()->id())->get();
        // dd($categories);
        // dd($products);
        return view('products.edit', [
            "product"=> $products,
            "categories"=> $categories,
            "units"  =>  $units,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid)
    {
        $product = Product::where('uuid', $uuid)->firstOrFail();
        $product->update($request->except('product_image'));

        $image= $product->product_image;
        if ($request->hasFile('product_image')) {

            // Delete Old Photo
            if ($product->product_image) {
                unlink(public_path('storage/') . $product->product_image);
            }
            $image = $request->file('product_image')->store('products', 'public');
        }


        $product->name= $request->name;
        $product->slug= Str::slug($request->name, '-');
        // $product->code= $request->code;
        $product->category_id   = $request->category_id;
        $product->unit_id       = $request->unit_id;
        $product->buying_price  = $request->buying_price;
        $product->selling_price = $request->selling_price;
        $product->quantity      = $request->quantity;
        $product->quantity_alert= $request->quantity_alert;
        $product->tax       =   $request->tax;
        $product->tax_type  =   $request->tax_type;
        $product->notes     =   $request->notes;
        $product->product_image = $image;

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product successfully updated.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
