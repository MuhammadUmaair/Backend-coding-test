@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Grouped Data</h1>

    @foreach ($groupedData as $owner => $files)
    <h3>{{ $owner }}</h3>
        @foreach ($files as $file)
        <p>{{ $file }}</p>
        @endforeach
    @endforeach
</div>
@endsection
