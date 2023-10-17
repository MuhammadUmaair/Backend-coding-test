<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;

class AttendanceService
{
    public function attendanceWithWorkingHours()
    {
        return Employee::select('id', 'name', 'attendance_id')
            ->with('attendance:id,check_in,check_out')
            ->get()
            ->map(function ($employee) {
                $attendance = $employee->attendance;
                $checkIn = optional($attendance)->check_in
                    ? Carbon::parse($attendance->check_in)->format('Y-m-d H:i:s')
                    : 'N/A';
                $checkOut = optional($attendance)->check_out
                    ? Carbon::parse($attendance->check_out)->format('Y-m-d H:i:s')
                    : 'N/A';
                $workingHours = optional($attendance)->check_in && optional($attendance)->check_out
                    ? Carbon::parse($attendance->check_out)->diffInHours(Carbon::parse($attendance->check_in))
                    : 'N/A';
                return [
                    'name' => $employee->name,
                    'check_in' => $checkIn,
                    'check_out' => $checkOut,
                    'total_working_hours' => $workingHours,
                ];
            });
    }
}
