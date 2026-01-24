@extends('layouts.student')

@section('title', 'Code Quest | Courses')

@section('content')
    <main class="main">
        @livewire('courses-filter')
    </main>

@endsection
