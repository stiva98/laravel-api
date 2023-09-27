@extends('layouts.app')

@section('page-title', 'Types')

@section('main-content')
    <div class="row">
        <div class="col-12 mb-4">
            <a href="{{ route('admin.types.create') }}" class="btn btn-warning w-100 mb-3">
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
                    @foreach ($types as $type)
                    <tr>
                        <th scope="row">
                        {{ $type ->id }}
                        </th>
                        <td>
                            {{ $type ->title }}
                        </td>
                        <td>
                            {{ $type ->content }}
                        </td>
                        <td>
                            <a href="{{ route('admin.types.show', ['type' => $type->id]) }}" class="btn btn-warning me-2">
                                Singolo Type
                            </a>
                            <a href="{{ route('admin.types.edit', ['type' => $type->id]) }}" class="btn btn-success me-2">
                                Modifica
                            </a>
                            <form action="{{ route('admin.types.destroy', ['type' => $type->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare il post?')">
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
