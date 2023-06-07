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
            <p>{{$project->stack}}</p>

            <!--             <i class="fa-brands fa-html5"></i>
            <i class="fa-brands fa-css3-alt"></i>
            <i class="fa-brands fa-bootstrap"></i>
            <i class="fa-brands fa-js"></i>
            <i class="fa-brands fa-vuejs"></i>
            <i class="fa-brands fa-php"></i>
            <i class="fa-brands fa-laravel"></i> -->
        </div>

    </div>
</div>

@endsection