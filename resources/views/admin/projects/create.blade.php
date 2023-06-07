@extends('layouts.admin')

@section('content')

<div class="bg-light py-3">

    <div class="container">

        <h5 class="text-uppercase text-muted my-4">Add a new Project</h5>

        <form action="{{route('admin.projects.store')}}" method="post">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Project title here " aria-describedby="nameHelper">

                @error('title')
                <div class="alert alert-danger" role="alert">
                    <strong>Errore: </strong>{{$message}}
                </div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Project description here " aria-describedby="nameHelper">

                @error('description')
                <div class="alert alert-danger" role="alert">
                    <strong>Errore: </strong>{{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="img_path" class="form-label">Image</label>
                <input type="text" name="img_path" id="img_path" class="form-control @error('img_path') is-invalid @enderror" placeholder="Project image here " aria-describedby="imageHelper">

                @error('img_path')
                <div class="alert alert-danger" role="alert">
                    <strong>Errore: </strong>{{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="stack" class="form-label">Stack</label>
                <input type="text" name="stack" id="stack" class="form-control @error('stack') is-invalid @enderror" placeholder="Project stack here " aria-describedby="nameHelper">

                @error('stack')
                <div class="alert alert-danger" role="alert">
                    <strong>Errore: </strong>{{$message}}
                </div>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary w-100 my-4">Save</button>

        </form>

    </div>

    @endsection