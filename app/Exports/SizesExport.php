<?php

namespace App\Exports;

use App\Size;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SizesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('excel.sizes', [
            'sizes' => Size::all()
        ]);
    }
}
