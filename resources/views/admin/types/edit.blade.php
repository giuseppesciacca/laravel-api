@extends('layouts.admin')

@section('content')

<div class="bg-light py-3">

    <div class="container">

        <h5 class="text-uppercase text-muted my-4">Edit "{{$type->name}}" Type name</h5>

        <form action="{{route('admin.types.update', $type)}}" method="post">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $type->name)}}" placeholder=" type name here " aria-describedby=" nameHelper">

                @error('name')
                <div class="alert alert-danger" role="alert">
                    <strong>Errore: </strong>{{$message}}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 my-4">Edit</button>

        </form>

    </div>
    @endsection