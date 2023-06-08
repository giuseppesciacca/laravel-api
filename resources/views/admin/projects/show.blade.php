@extends('layouts.admin')

@section('content')
<?php

dd($project)
?>

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

            <div class="meta">
                <span class="badge bg-secondary">{{$project}}</span>
            </div>
        </div>

    </div>
</div>

@endsection