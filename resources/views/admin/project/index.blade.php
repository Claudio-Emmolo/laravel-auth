@extends('layouts.adminProject')

@section('title', 'Project Index')

@section('main-app')

<table class="table">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">URL</th>
        <th scope="col">Date</th>
        <th scope="col">Difficulty</th>
        <th scope="col">Tecnologies</th>
        <th>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">+ New Project</a>
        </th>
      </tr>
    </thead>
    <tbody>
        @forelse ($projectList as $project)
      <tr>
            <td>{{$project->title}}</td>
            <td>{{$project->url}}</td>
            <td>{{$project->date}}</td>
            <td>{{$project->difficulty}}</td>
            <td>{{$project->tecnologies}}</td>
            <td>
                <a href="{{route('admin.projects.show', $project->id)}}" class="btn btn-primary">Show</a>
                <a href="#" class="btn btn-success">Edit</a>
            </td>
        @empty
            <td>
                <p>Nulla da mostrare</p>
            </td>
        </tr>
        @endforelse
    </tbody>
  </table>




@endsection