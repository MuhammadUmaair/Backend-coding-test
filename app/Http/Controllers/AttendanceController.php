<?php

namespace App\Http\Controllers;

use App\Imports\AttendanceImport;
use App\Models\Employee;
use App\Services\AttendanceService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendanceService = new AttendanceService();
        $attendanceInformation = $attendanceService->attendanceWithWorkingHours();
        return view('attendance', ['attendanceData' => json_encode($attendanceInformation)]);

    }



    public function uploadAttendance(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $file = $request->file('file');
        Excel::import(new AttendanceImport, $file->store('files'));
        return response()->json(['message' => 'Data imported successfully.'], 200);
    }
}
