<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExcelExport implements FromView
{
    public function __construct($excel,$excel1){

        $this->excel=$excel;
        $this->excel1=$excel1;
    }

    public function view(): View
    {
        return view ('admin.exportdata',
                ['excel'=>$this->excel],
                ['excel1'=>$this->excel1]);
    }
}
