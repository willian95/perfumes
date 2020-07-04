<?php

namespace App\Exports;

use App\Type;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TypesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('excel.types', [
            'types' => Type::all()
        ]);
    }
}
