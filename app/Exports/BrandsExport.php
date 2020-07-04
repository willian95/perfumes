<?php

namespace App\Exports;

use App\Brand;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BrandsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('excel.brands', [
            'brands' => Brand::all()
        ]);
    }
}
