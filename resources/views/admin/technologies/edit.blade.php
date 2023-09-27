@extends('layouts.app')

@section('page-title', 'Modifica'. $technology->title)


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                Modifica {{ $technology ->title }}
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.technologies.update', ['technology' => $technology ->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Inserisci titolo <strong class="color-strong">*</strong></label>
                    <input type="text" max-lenght="64" class="form-control @error ('title') is invalid @enderror" id="title" name="title" placeholder="Inserisci titolo..." required value="{{ old('title', $technology ->title) }}">
                </div>
                @error('title')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="content" class="form-label">Inserisci contenuto</label>
                    <textarea class="form-control @error ('control') is invalid @enderror" id="content" name="content" placeholder="Inserisci il contenuto..." rows="3">{{ old('content', $technology ->content) }}</textarea>
                </div>
                @error('content')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
                <div>
                    <button type="submit" class="btn btn-warning w-100">
                        + Aggiungi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection