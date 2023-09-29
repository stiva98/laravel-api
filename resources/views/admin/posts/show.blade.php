@extends('layouts.app')

@section('page-title', $post ->title)


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                {{ $post ->title }}
            </h1>
            <a href="{{ route('admin.posts.index') }}">
                - Torna indietro
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    @if ($post->cover_image)
                        <div>
                            <img src="{{ $post->full_cover_image }}" alt="{{ $post->title }}" class="w-100">
                        </div>
                    @endif
                    <p class="card-text">
                        <div class="text-warning">
                            Slug: <strong>{{ $post->slug }} </strong>
                        </div>
                        <div>
                            Content: <strong>{{ $post->content }}</strong>
                        </div>
                        <div>
                            @if ($post->type)
                                Type: <strong>{{ $post->type->title }}</strong>
                            @else
                            Type: -
                            @endif
                        </div>
                        <div>
                            Technology:
                            @foreach ($post->technologies as $technology)
                                <strong>
                                    - {{ $technology->title }}
                                </strong>
                            @endforeach
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
