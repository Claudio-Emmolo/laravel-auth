@extends('layouts.app')

@section('title', 'Home')

@section('content')

<a href="{{url('/projects')}}" class="btn btn-dark m-5"><i class="fa-solid fa-hand-point-left"></i></a>
<div class="card-project text-center">
  @if($project->preview_img != null)
  <img src="{{$project->preview_img}}" alt="{{$project->title}}" class="img-fluid mb-2">
  @else
  <img src="{{ Vite::asset('resources/img/no-img-available.jpg') }}" alt{{$project->title}}" class="img-fluid mb-2">
  @endif  
  <h2>
    Titolo: {{$project->title}}
  </h2>
  <a href="{{$project->url}}" class="btn"><i class="fs-1 fa-brands fa-github"></i></a>
  <p>
    Data: {{$project->date}}<br>
    Livello difficoltà: {{$project->difficulty}}<br>
    Tecnologie usate: {{$project->tecnologies}}<br>
  </p>
</div>

@endsection