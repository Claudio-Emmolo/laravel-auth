@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="fw-bold text-uppercase text-center mt-5">Recent Projects</h1>

    <div class="row row-cols-3 mb-5">
        @foreach ($projectList as $project)
            <div class="col g-4">
                <a href="" class="text-decoration-none">
                    <div class="p-2 home-card h-100">
                        <img src="{{$project->preview_img}}" alt="" class="img-fluid mb-2">
                        <h3 class="text-dark">{{$project->title}}</h3>
                    </div>
                </a>
             </div>
        @endforeach
    </div>
</div>
@endsection