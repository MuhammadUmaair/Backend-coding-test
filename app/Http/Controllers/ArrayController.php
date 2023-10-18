<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArrayController extends Controller
{
    public function index()
    {
        return view('duplicateArray.getinput');
    }

    public function findDuplicates(Request $request)
    {
        $inputArray = explode(',', $request->input('inputArray'));
        $duplicates = array_unique(array_diff_assoc($inputArray, array_unique($inputArray)));

        return view('duplicateArray.output', ['duplicates' => $duplicates]);
    }
}
