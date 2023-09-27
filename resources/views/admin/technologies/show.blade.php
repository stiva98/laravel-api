@extends('layouts.app')

@section('page-title', $technology ->title)


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                {{ $technology ->title }}
            </h1>
            <a href="{{ route('admin.technologies.index') }}">
                - Torna indietro
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $technology->title }}</h5>
                    <p class="card-text">
                        <div>
                            Content: <strong>{{ $technology->content }}</strong>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col bg-light">
            <h2>
                Post collegati
            </h2>
            <ul>
                @foreach ($technology->posts as $post)
                    <li>
                        <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}">
                            {{ $post->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div> --}}
@endsection