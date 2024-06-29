@extends('layouts.admin')

@section('content')
    <div class="container mt-5">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif


        <h2>Titolo {{ $project->id }}:</h2>
        <h3>{{ $project->title }}</h3>
        <p>Categoria: {{ $project->category?->name }} </p>
        <hr>
        <h5>Descrizione:</h5>
        <p>{{ $project->description }}</p>
        <hr>
        <h5>Slug</h5>
        <p>{{ $project->slug }}</p>

        {{-- Technology --}}
        <div>
            @forelse ($project->technologies as $technology)
                <p class="badge" style="background: {{ $technology->color }}">
                    {{ $technology->name }}
                </p>
            @empty
                <p class="badge" style="background: grey">Niente</p>
            @endforelse
        </div>

        <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Indietro</a>
    </div>
@endsection
