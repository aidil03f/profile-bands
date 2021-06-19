@extends('layouts.base')
@section('baseStyles')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@push('baseScripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush

@section('body')
    <x-navbar></x-navbar>
    <div class="mt-4">
        @yield('content')
    </div>
@endsection