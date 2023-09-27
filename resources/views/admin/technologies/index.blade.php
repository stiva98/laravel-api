@extends('layouts.app')

@section('page-title', 'Technologies')

@section('main-content')
    <div class="row">
        <div class="col-12 mb-4">
            <a href="{{ route('admin.technologies.create') }}" class="btn btn-warning w-100 mb-3">
                + Aggiungi
            </a>
        </div>
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                    <tr>
                        <th scope="row">
                        {{ $technology ->id }}
                        </th>
                        <td>
                            {{ $technology ->title }}
                        </td>
                        <td>
                            {{ $technology ->content }}
                        </td>
                        <td>
                            <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="btn btn-warning me-2">
                                Singola tecnologia
                            </a>
                            <a href="{{ route('admin.technologies.edit', ['technology' => $technology->id]) }}" class="btn btn-success me-2">
                                Modifica
                            </a>
                            <form action="{{ route('admin.technologies.destroy', ['technology' => $technology->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare il post?')">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger me-2">
                                    Elimina
                                </button>
                            </form>
                        </td>
                    </tr>  
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
