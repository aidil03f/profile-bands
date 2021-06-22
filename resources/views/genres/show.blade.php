@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Genre {{ $title }}</div>
            <div class="card-body">
                @foreach ($bands as $band)
                    <a href="{{ route('bands.show', $band) }}" class="d-block">{{ $band->name }}</a>
                @endforeach

                <div class="{{ $bands->hasMorePages() ? 'mt-3' : '' }}">
                    {{ $bands->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
