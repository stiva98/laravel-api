@extends('layouts.app')

@section('page-title', 'Crea il nuovo Post')


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                Crea il tuo nuovo Post
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Inserisci titolo <strong class="color-strong">*</strong></label>
                    <input type="text" max-lenght="64" class="form-control @error ('title') is invalid @enderror" id="title" name="title" placeholder="Inserisci titolo..." required value="{{ old('title') }}">
                </div>
                @error('title')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="slug" class="form-label">Inserisci slag <strong class="color-strong">*</strong></label>
                    <input type="text"  max-lengh="64" class="form-control @error ('slug') is invalid @enderror" id="slug" name="slug" placeholder="Inserisci slag..." required value="{{ old('slug') }}">
                </div>
                @error('slug')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="content" class="form-label">Inserisci contenuto</label>
                    <textarea class="form-control @error ('content') is invalid @enderror" id="content" name="content" placeholder="Inserisci il contenuto..." rows="3">{{ old('content') }}</textarea>
                </div>
                @error('content')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <label class="input-group-text" for="cover_image">Carica un'immagine</label>
                    <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*"> 
                </div>
                @error('cover_image')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="type_id" class="form-label">Tipo</label>
                    <select class="form-select" id="type_id" name="type_id">
                        <option value="">Seleziona un tipo...</option>
                        @foreach ($types as $type)
                            <option
                                value="{{ $type->id }}"
                                @if (old('type_id') == $type->id)
                                    selected
                                @endif
                                >
                                {{ $type->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label d-block">Tecnologie</label>
                    @foreach ($technologies as $technology)
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="technologies[]"
                                id="technology-{{ $technology->id }}"
                                value="{{ $technology->id }}"
                                @if (
                                    in_array(
                                        $technology->id,
                                        old('technologies', [])
                                    )
                                )
                                    checked
                                @endif
                                >
                            <label class="form-check-label" for="technology-{{ $technology->id }}">
                                {{ $technology->title }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div>
                    <button type="submit" class="btn btn-warning w-100">
                        + Aggiungi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection