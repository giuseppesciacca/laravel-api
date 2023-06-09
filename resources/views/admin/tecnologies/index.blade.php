@extends('layouts.admin')

@section('content')

<div class="container">
    @include('partials.session_message')

    <h1 class="py-4">Tecnologies View</h1>

    <div class="row">
        <div class="col-12 col-lg-6">
            <h6>Create new Tecnology</h6>
            <form action="{{route('admin.tecnologies.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="helpId" placeholder="New Type here">
                    <small id="helpId" class="form-text text-muted">Create a new Tecnology. Max 50 characters.</small>
                </div>
                @error('name')
                <div class="alert alert-danger" role="alert">
                    <strong>Errore: </strong>{{$message}}
                </div>
                @enderror


                <button type="submit" class="btn btn-warning">Add</button>
            </form>
        </div>
        <!-- column up/left -->

        <div class="col-12 col-lg-6">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>Count</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tecnologies as $tecnology)
                        <tr>
                            <td>{{$tecnology->id}}</td>
                            <td>{{$tecnology->name}}</td>
                            <td> <span class="badge bg-dark">{{$tecnology->projects->count()}}</span></td>
                            <td>{{$tecnology->slug}}</td>
                            <td>
                                <a href="{{route('admin.tecnologies.edit', $tecnology->slug)}}"><i class="fa-solid fa-pencil"></i></a>
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalId-{{$tecnology->id}}">
                                    <i class="fa-solid fa-trash-can" style="color: #dc3545"></i>
                                </button>


                                <!-- Modal -->
                                <div class="modal fade" id="modalId-{{$tecnology->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="modalTitleId">Delete "{{$tecnology->name}}" tecnology?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to delete this tecnology?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="{{route('admin.tecnologies.destroy', $tecnology)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Confirm</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </tr>
                        @empty
                        <p>No types</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- column down/right -->
    </div>
</div>

</html>

@endsection