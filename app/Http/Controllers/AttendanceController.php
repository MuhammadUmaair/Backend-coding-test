<?php

namespace App\Http\Controllers;

use App\Imports\AttendanceImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    public function uploadAttendance(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $file = $request->file('file');
        Excel::import(new AttendanceImport(), $file);
        if (count(AttendanceImport::failures()) > 0) {
            return response()->json(['message' => 'Failed to import data.'], 400);
        }

        return response()->json(['message' => 'Data imported successfully.'], 200);
    }
}

