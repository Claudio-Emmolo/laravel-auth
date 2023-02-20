@extends('layouts.adminProject')

@section('title', 'New Project')

@section('main-app')
<h1 class="fw-bold my-5 text-center">Create new project</h1>

<form action="{{ route('admin.projects.store') }}"  method="POST" class="container">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Project Title</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Project URL</label>
        <input type="text" class="form-control" id="title" name="url">
    </div>

    <div class="mb-3">
        <label for="date" class="form-label">Project Date</label>
        <input type="datetime-local" class="form-control" id="date" name="date">
    </div>

    <div class="mb-3">
        <label for="preview_img" class="form-label">Preview Img Link</label>
        <input type="text" class="form-control" id="preview_img" name="preview_img">
    </div>

    <div class="mb-3">
        <label for="difficulty" class="form-label">Project Difficulty</label>
        <input type="number" class="form-control" id="difficulty" name="difficulty">
    </div>

    <div class="mb-3">
        <label for="tecnologies" class="form-label">Tecnologies</label>
        <input type="text" class="form-control" id="tecnologies" name="tecnologies">
    </div>

    <button type="submit" class="btn btn-primary">Send</button>
</form>
@endsection