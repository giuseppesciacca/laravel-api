@extends('layouts.admin')

@section('content')
<h1>Types</h1>

<div class="container">
    <div class="row">
        <div class="col-6"></div>
        <div class="col-6">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>Slug</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($types as $type)
                        <tr>
                            <td>{{$type->id}}</td>
                            <td>{{$type->name}}</td>
                            <td>{{$type->slug}}</td>
                        </tr>
                        @empty
                        <p>No types</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


</html>

@endsection