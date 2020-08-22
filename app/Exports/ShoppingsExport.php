<?php

namespace App\Exports;

use App\Payment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ShoppingsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('excel.shoppings', [
            'payments' => Payment::with("productPurchases", "user", "productPurchases.productTypeSize", "productPurchases.productTypeSize.product", "productPurchases.productTypeSize.product.brand", "productPurchases.productTypeSize.type", "productPurchases.productTypeSize.size")->has("productPurchases")->has("user")->has("productPurchases.productTypeSize")->has("productPurchases.productTypeSize.product")->has("productPurchases.productTypeSize.product.brand")->has("productPurchases.productTypeSize.type")->has("productPurchases.productTypeSize.size")->get()
        ]);
    }
}
