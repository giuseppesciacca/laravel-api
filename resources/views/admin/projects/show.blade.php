@extends('layouts.admin')

@section('content')

<div class="container p-5">
    <div class="row row-cols-1 row-cols-lg-2">

        <div class="col">
            <img class="img-fluid" src=" {{asset('storage/'. $project->img_path)}}" alt="{{$project->slug}}">
        </div>

        <div class="col">
            <h1>{{$project->title}}</h1>
            <p>{{$project->description}}</p>
            <div class="meta">
                <span class="badge bg-primary">{{$project->type?->name}}</span>
            </div>

            <div>
                <a href="{{$project->github_repo}}" class="text-decoration-none" target="blank">Repo Github <i class="fa-brands fa-square-github fa-2x"></i></a>
            </div>

            @if ($project->project_link)
            <div>
                <a href="{{$project->project_link}}" class="text-decoration-none" target="blank">Go to project <i class="fa-solid fa-binoculars fa-2x"></i></a>
            </div>
            @endif

            <div class="meta">
                @foreach ($project->tecnologies as $tecnology)
                <span class="badge bg-secondary">{{$tecnology?->name}}</span>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection