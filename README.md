## Migrations

![image](https://github.com/MuhammadUmaair/Backend-coding-test/assets/104490047/56e46890-6031-4e67-a373-57e973cd3828)

## Controllers

**Create Controllers As Per Requirements**

``` php artisan make:controller AttendanceController ```


``` php artisan make:controller ArrayController ```

## Models

**Create Models As Per Requirements**

``` php artisan make:model Attendance ```

## Routes

### for Array Duplicate file

```
    http://127.0.0.1:8000/get-input

```
### for Create an API endpoint to upload excel attendance and store data in the database.
```
http://127.0.0.1:8000/api/attendance/upload

```

### for Create an API endpoint to return attendance information of an employee with total working hours.

```
http://127.0.0.1:8000/api/index

```

## Dependencies Or Packages

 **to handle file uploads and Excel file parsing. we need to install package**

 ### For Excel
 
``` composer require maatwebsite/excel ```

The Maatwebsite\Excel\ExcelServiceProvider is auto-discovered and registered by default.

If you want to register it yourself, add the ServiceProvider in config/app.php

```
    'providers' => [
        /*
        * Package Service Providers...
        */
        Maatwebsite\Excel\ExcelServiceProvider::class,
    ]

```

The Excel facade is also auto-discovered.

If you want to add it manually, add the Facade in config/app.php:

``` 
'aliases' => [
    ...
    'Excel' => Maatwebsite\Excel\Facades\Excel::class,
]

```
To publish the config, run the vendor publish command:

``` php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config ```

To create an Excel import class you need to run this command

``` php artisan make:import AttendanceImport ```

Use this website as  a Reference [Laravel Excel](https://docs.laravel-excel.com/3.1/getting-started/installation.html).

### For Laravel Passport

 **To install passport package you need to run this command ,Laravel Passport is used for API authentication.**

``` composer require laravel/passport ```

 **Run migrate command that will migrated oauth's tables created by Laravel Passport.**

``` php artisan migrate ```

**This Command created Personal Access Client**

``` php artisan passport:install ```

**Create a service inside**
To Create Services, we create a folder in app directory name 'Services', then we create a file 'NameService.php'.

In This file make a function attendanceWithWorkingHours(), write a query with f_key relation, and get the values we need.for better performance we use select

```
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

```

**Usage Of Relation**

In our migrations , we create relation as per requirements.so in our 'Employee' model we create a function to get values by using f_key.

```
public function attendance()
    {
        return $this->belongsTo(Attendance::class, 'attendance_id', 'id');
    }

```

**Now In AttendanceController:**

we return values by using AttendanceService function.
```
public function index()
    {
        $attendanceService = new AttendanceService();
        $attendanceInformation = $attendanceService->attendanceWithWorkingHours();
        return view('attendance', ['attendanceData' => json_encode($attendanceInformation)]);

    }

```

## For React:

Use this website as a Reference [React In Laravel](https://adevait.com/laravel/using-laravel-with-react-js).

**use this command for mix:** 

```
    npm install --save-dev laravel-mix-react
    
```

**Here is our output:**

![image](https://github.com/MuhammadUmaair/Backend-coding-test/assets/104490047/79406af4-61b1-47d6-ad36-c721857ae701)

Use this official website as a Reference [Laravel Passport](https://laravel.com/docs/8.x/passport).

## For Duplicate Array Values

**Controller**

```
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

```

**we create two file one for input and one for output**

**InputFile**

```
    <form method="POST" action="/find-duplicates">
        @csrf
        <div class="form-group">
            <label for="inputArray">Enter comma-separated elements:</label>
            <input type="text" name="inputArray" class="form-control" id="inputArray">
        </div>
        <button type="submit" class="btn btn-primary">Find Duplicates</button>
    </form>

```

**OutPutFile**

```
    <div class="container">
        <h1>Duplicate Array Elements</h1>


        @if (count($duplicates) > 0)
            <div>
                <h6><b>Output:</b></h6>
                <p>
                    @foreach ($duplicates as $duplicate)
                        {{ $duplicate }}@if (!$loop->last), @endif
                    @endforeach
                </p>
                <p><b>Explanation:</b> {{ implode(', ', $duplicates) }} occur more than once in the given array.</p>
            </div>
        @else
            <p>No duplicates found.</p>
        @endif
        <a href="{{ route('arrayinput') }}">Back</a>
    </div>

```
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
