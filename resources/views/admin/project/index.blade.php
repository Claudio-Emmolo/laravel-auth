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
                <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-success">Edit</a>
                <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST" class="form-delete d-inline" tag="{{$project->title}}">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">Delete</button>
                </form>
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

@section('script')
@vite(['resources/js/deleteConfirm.js'])
@endsection