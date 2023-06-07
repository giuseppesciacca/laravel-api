@extends('layouts.admin')

@section('content')
<div class="container-fluid bg-light py-3">
    <h5>Add new Project</h5>
    <a href="{{route('admin.projects.create')}}"><i class="fa-solid fa-plus fa-2x"></i></a>

    <table class="table table-striped m-0 py-5">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">img_path</th>
                <th scope="col">stack</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($projects as $project)
            <tr>
                <td scope="row">{{$project->title}}</td>
                <td>{{$project->slug}}</td>
                <td class="text-center">
                    <img class="img-fluid" style="height: 100px;" src="{{$project->img_path}}" alt="{{$project->title}}" loading="lazy">
                </td>
                <td>{{$project->stack}}</td>
                <td>
                    <a href="{{route('admin.projects.show', $project->slug)}}"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('admin.projects.edit', $project->slug)}}"><i class="fa-solid fa-pencil"></i></a>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalId-$project->id">
                        <i class="fa-solid fa-trash-can" style="color: #dc3545"></i>
                    </button>


                    <!-- Modal -->
                    <div class="modal fade" id="modalId-$project->id" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalTitleId">Delete Project</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure to delete this project?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{route('admin.projects.destroy', $project->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Confirm</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>

            @empty
            <p>No projects</p>
        </tbody>
        @endforelse
    </table>



</div>
@endsection