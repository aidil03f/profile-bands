@extends('layouts.base')
@section('baseStyles')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('baseScripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

@section('body')
    <x-navbar></x-navbar>
    <div class="mt-4">
        @yield('content')
    </div>

    <footer class="mt-5 border-top py-5">
        <div class="container">
            Lorem ipsum dolor sit amet.
        </div>
    </footer>
@endsection