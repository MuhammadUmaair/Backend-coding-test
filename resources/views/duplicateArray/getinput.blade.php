@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Find Duplicate Array Elements</h1>
        <form method="POST" action="/find-duplicates">
            @csrf
            <div class="form-group">
                <label for="inputArray">Enter comma-separated elements:</label>
                <input type="text" name="inputArray" class="form-control" id="inputArray">
            </div>
            <button type="submit" class="btn btn-primary">Find Duplicates</button>
        </form>
    </div>
@endsection
