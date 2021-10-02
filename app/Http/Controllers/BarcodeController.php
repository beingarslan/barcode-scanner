<?php

namespace App\Http\Controllers;

use App\Barcode;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function saveresults(Request $request)
    {
        try {
            foreach ($request->input('value') as $value)
                $barcode = Barcode::create([
                    'barcode_value' => $value
                ]);


            return redirect()->back()->with('success', 'Results has been saved successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Error while adding the data');
        }
    }
}
