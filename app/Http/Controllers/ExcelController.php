<?php

namespace App\Http\Controllers;

class ExcelController extends Controller
{
    public function read_excel()
    {
        $file = storage_path('/app/public/excel-test.xlsx');

        $excel_data = file_get_contents($file);

        $rows = array_map([$this, 'str_getExcel'], explode("\n", $excel_data));

        $header = array_shift($rows);

       // dd($rows);

        return view('read_excel', compact('rows', 'header'));
    }

    // Define the custom function to parse Excel data
    private function str_getExcel($row)
    {
        // Add your logic to parse the Excel row here
        return explode(",", $row);
    }


    
}
