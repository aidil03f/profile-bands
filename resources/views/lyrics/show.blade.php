@extends('layouts.app')

@section('content')
    <div class="container">
        <img class="w-100 rounded mb-3" height="500" style="object-fit: cover; object-position: top" src="{{ $band->picture }}" alt="{{ $band->name }}">
        
        <div class="row">
            <div class="col-md-8">
                <h4 class="mb-4">{{ $band->name }} - <span class="text-secondary">{{ $lyric->title }}</span></h4>

                <div>
                    {!! nl2br($lyric->body) !!}
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="mb-4">The same album</h4>
                @foreach ($lyrics as $item)
                    <a href="{{ route('lyrics.show', [$band, $item]) }}" class="d-block">
                        {{ $item->title }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection