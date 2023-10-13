<?php

namespace App\Http\Controllers;

use App\Imports\AttendanceImport;
use App\Models\Employee;
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
        Excel::import(new AttendanceImport, $file->store('files'));

        // if (count(AttendanceImport::$failures) > 0) {
        // Handle failures
        // return response()->json(['message' => 'Failed to import data.'], 400);
        // }

        return response()->json(['message' => 'Data imported successfully.'], 200);
    }

    public function getEmployeeAttendance($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }
        $attendanceRecords = $employee->attendance;
        $totalWorkingHours = $attendanceRecords->sum('working_hours');
        return response()->json([
            'employee' => $employee,
            'attendance' => $attendanceRecords,
            'total_working_hours' => $totalWorkingHours,
        ], 200);
    }
}
