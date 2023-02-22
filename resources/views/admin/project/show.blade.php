@extends('layouts.adminProject')

@section('title', "Project - $project->title")

@section('main-app')

    <a href="{{ route('admin.projects.index') }}" class="btn btn-dark m-5"><i class="fa-solid fa-arrow-left"></i></a>

    <div class="card-project container">
        <div class="row">
            <div class="col-6 text-center border">
                @if ($project->preview_img != null)
                    <img src="{{ $project->preview_img }}" alt="{{ $project->title }}" class="img-fluid mb-2">
                @else
                    <img src="{{ Vite::asset('resources/img/no-img-available.jpg') }}" alt{{ $project->title }}"
                        class="img-fluid w-75 mb-2">
                @endif
            </div>
            <div class="col-6 pt-3">
                <h2>
                    Titolo: {{ $project->title }}
                </h2>
                <a href="{{ $project->url }}" class="btn btn-light"><i class="fs-1 fa-brands fa-github"></i></a>
                <p>
                    Data: {{ $project->date }}<br>
                    Livello difficoltà:
                    @for ($i = 0; $i < $project->difficulty; $i++)
                        <i class="text-warning fa-solid fa-star"></i>
                    @endfor
                    <span>
                        ({{ $project->difficulty }})
                    </span><br>
                <p>
                    Tecnologie usate: <br>
                    {{ $project->tecnologies }}<br>
                </p>
                </p>
            </div>
        </div>

        <div class="buttons my-5 text-center">
            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-success"><i
                    class="fs-1 fa-solid fa-pen-to-square"></i></a>

            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="form-delete d-inline"
                tag="{{ $project->title }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"><i class="fs-1 fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>

@endsection


@section('script')
    @vite(['resources/js/deleteConfirm.js'])
@endsection
