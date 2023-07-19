@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Welcome {{Auth::user()->name}} </h2>
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center gap-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{Auth::user()->name}} {{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Total Project</h4>
                    <p class="card-text">You have uploaded {{$projectsCount}} projects</p>
                    <p>ADD more <a href="{{route('admin.projects.create')}}"><i class="fa-solid fa-plus fa-fw fa-lg"></i></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection