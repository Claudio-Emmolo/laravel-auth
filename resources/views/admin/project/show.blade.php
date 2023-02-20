@extends('layouts.adminProject')

@section('title', 'Project Show')

@section('main-app')

<a href="{{route('admin.projects.index')}}" class="btn btn-dark mb-5">Go back</a>

<div class="card-project text-center">
  <img src="{{$project->preview_img}}" alt="{{$project->title}}" class="img-fluid">
  <h2>
    Titolo: {{$project->title}}
  </h2>
  <a href="{{$project->url}}">LINK GITHUB</a>
  <p>
    Data: {{$project->date}}<br>
    Livello difficoltà: {{$project->difficulty}}<br>
    Tecnologie usate: {{$project->tecnologies}}<br>
  </p>
</div>

@endsection