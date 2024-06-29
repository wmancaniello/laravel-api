@extends('layouts.admin')

@section('content')
    <div class="container mt-4 gap-5">

        @if (session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif


        <h1>Lista Progetti:</h1>
        <a class="btn btn-success my-2" href="{{ route('admin.projects.create') }}">
            <i class="fa-solid fa-plus"></i> Nuovo progetto
        </a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listProject as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->category?->name }}</td>
                        <td>{{ $project->slug }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                {{-- Show --}}
                                <a class="btn btn-primary"
                                    href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">
                                    <i class="fa-solid fa-circle-info"></i>
                                </a>
                                {{-- Edit --}}
                                <a class="btn btn-warning"
                                    href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                {{-- Delete --}}
                                <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
