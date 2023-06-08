@extends('layouts.admin')

@section('content')
<div class="container p-5">
    <div class="row row-cols-1 row-cols-lg-2">

        <div class="col">
            <img class="img-fluid" src=" {{$project->img_path}}" alt="{{$project->slug}}">
        </div>

        <div class="col">
            <h1>{{$project->title}}</h1>
            <p>{{$project->description}}</p>
            <div class="meta">
                <span class="badge bg-primary">{{$project->type?->name}}</span>
            </div>
            <!-- <p>{{$project->stack}}</p> -->
            @forelse ($tecnologies as $tecnology)
            <div class="meta">
                <span class="badge bg-secondary">{{$project->tecnology?->name}}</span>
            </div>
            @empty

            @endforelse
        </div>

    </div>
</div>

@endsection