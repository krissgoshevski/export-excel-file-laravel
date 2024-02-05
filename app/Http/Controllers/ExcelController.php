<?php

namespace App\Http\Controllers;

use App\Mail\ExcelDataMail;
use Illuminate\Support\Facades\Mail;

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


    public function send_email()
    {
        $file = storage_path('/app/public/excel-test.xlsx');

        $excel_data = file_get_contents($file);

        $rows = array_map([$this, 'str_getExcel'], explode("\n", $excel_data));

        $header = array_shift($rows);

        // Send email with Excel data
        Mail::to('recipient@example.com')->send(new ExcelDataMail($rows, $header));

        return redirect()->back()->with('success', 'Email sent successfully.');
    }

    
}
