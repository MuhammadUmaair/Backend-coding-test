@extends('layouts.app')

@section('content')
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
@endsection
