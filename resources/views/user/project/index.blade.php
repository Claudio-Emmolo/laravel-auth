@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <h1 class="fw-bold text-uppercase text-center mt-5">Recent Projects</h1>

    <div class="row row-cols-3 mb-5">
        @foreach ($projectList as $project)
            <div class="col g-4">
                <a href="{{route('projects.show', $project->id)}}" class="text-decoration-none">
                    <div class="p-2 home-card h-100">
                        @if($project->preview_img != null)
                            <img src="{{$project->preview_img}}" alt="{{$project->title}}" class="img-fluid mb-2">
                        @else
                        <img src="{{ Vite::asset('resources/img/no-img-available.jpg') }}" alt{{$project->title}}" class="img-fluid w-100 mb-2">
                        @endif
                        <div class="row">
                            <h3 class="text-dark">{{$project->title}}</h3>
                        </div>
                    </div>
                </a>
             </div>
        @endforeach
    </div>
</div>
@endsection