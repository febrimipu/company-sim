<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductImportController extends Controller
{
    public function create()
    {
        return view('products.import');
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|file|mimes:xls,xlsx',
        // ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Data product has been imported!');
    }
    
}
