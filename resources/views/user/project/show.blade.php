@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <a href="{{ route('projects.index') }}" class="btn btn-dark m-5"><i class="fa-solid fa-arrow-left"></i></a>

    <div class="card-project container">
        <div class="row">
            <div class="col-6 text-center border">
                {{-- Img Controls --}}
                @if ($project->preview_img != null)

                    @if (!$project->isImageUrl())
                    <img src="{{ asset('storage/' . $project->preview_img) }}" @else <img
                            src="{{ $project->preview_img }}" alt="{{ $project->title }}" class="img-fluid mb-2">
                    @endif
                @else
                    <img src="{{ Vite::asset('resources/img/no-img-available.jpg') }}" @endif
                    alt{{ $project->title }}"
                    class="img-fluid w-75 mb-2">
            </div>
            <div class="col-6 pt-3">
                <h2>
                    Titolo: {{ $project->title }}
                </h2>
                <a href="{{ $project->url }}" target="_blank" class="btn btn-light"><i
                        class="fs-1 fa-brands fa-github"></i></a>
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

    @endsection
