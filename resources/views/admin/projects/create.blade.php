@extends('layouts.admin')

@section('content')

<div class="bg-light py-3">

    <div class="container">

        <h5 class="text-uppercase text-muted my-4">Add a new Project</h5>

        <form action="{{route('admin.projects.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title (*)</label>
                <input type="text" name="title" id="title" value="{{old('title')}}" class=" form-control @error('title') is-invalid @enderror" placeholder="Project title here " aria-describedby="nameHelper">

                @error('title')
                <div class="alert alert-danger" role="alert">
                    <strong>Errore: </strong>{{$message}}
                </div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea cols="30" rows="5" name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="project description here " aria-describedby="nameHelper"></textarea>

                @error('description')
                <div class="alert alert-danger" role="alert">
                    <strong>Errore: </strong>{{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="github_repo" class="form-label">Image</label>
                <input type="file" name="img_path" id="img_path" class="form-control @error('img_path') is-invalid @enderror" placeholder="Project image here " aria-describedby="imageHelper">

                @error('img_path')
                <div class="alert alert-danger" role="alert">
                    <strong>Errore: </strong>{{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="github_repo" class="form-label">Github Repo url (*)</label>
                <input type="text" name="github_repo" id="github_repo" class="form-control @error('github_repo') is-invalid @enderror" placeholder="Project url here" aria-describedby="imageHelper">

                @error('github_repo')
                <div class="alert alert-danger" role="alert">
                    <strong>Errore: </strong>{{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="project_link" class="form-label">Project url</label>
                <input type="text" name="project_link" id="project_link" class="form-control @error('project_link') is-invalid @enderror" placeholder="Project_link here" aria-describedby="imageHelper">

                @error('project_link')
                <div class="alert alert-danger" role="alert">
                    <strong>Errore: </strong>{{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Type (*)</label>
                <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror">
                    <option value="">Select a type</option>
                    @foreach ($types as $type)
                    <option value="{{$type->id}}" {{ $type->id == old('type_id', '') ? 'selected' : '' }}> {{$type->name}}
                    </option>
                    @endforeach
                </select>

                @error('type_id')
                <div class="alert alert-danger" role="alert">
                    <strong>Errore: </strong>{{$message}}
                </div>
                @enderror
            </div>

            <div class='form-group'>
                <p>Select the tecnologies:</p>
                @foreach ($tecnologies as $tecnology)
                <div class="form-check @error('tecnologies') is-invalid @enderror">
                    <label class='form-check-label'>
                        <input name='tecnologies[]' type='checkbox' value='{{ $tecnology->id}}' class='form-check-input' {{ in_array($tecnology->id, old('tecnologies', [])) ? 'checked' : '' }}>
                        {{ $tecnology->name }}
                    </label>
                </div>
                @endforeach
                @error('tecnologies')
                <div class='invalid-feedback'>{{ $message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 my-4">Save</button>

            <p>
                (*) -> required!
            </p>
        </form>

    </div>

    @endsection