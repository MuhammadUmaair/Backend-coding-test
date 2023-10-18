<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">

</head>
<body>
    <div id="app"></div>

    <script>
        var attendanceData = @json($attendanceData);
    </script>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
