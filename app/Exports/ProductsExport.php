<?php

namespace App\Exports;

use App\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('excel.products', [
            'products' => Product::with("category", "brand", "productTypeSizes", "productTypeSizes.type", "productTypeSizes.size")->has("category", "brand", "productTypeSizes", "productTypeSizes.type", "productTypeSizes.size")->get()
        ]);
    }
}
