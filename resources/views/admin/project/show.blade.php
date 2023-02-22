@extends('layouts.adminProject')

@section('title', "Project - $project->title")

@section('main-app')

<a href="{{route('admin.projects.index')}}" class="btn btn-dark m-5"><i class="fa-solid fa-hand-point-left"></i></a>

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

  <div class="buttons mb-5">
    <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-success"><i class="fs-1 fa-solid fa-pen-to-square"></i></a>

    <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST" class="form-delete d-inline" tag="{{$project->title}}">
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