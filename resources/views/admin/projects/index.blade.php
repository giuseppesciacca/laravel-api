@extends('layouts.admin')

@section('content')
<div class="container-fluid bg-light py-3">
    @include('partials.session_message')
    @include('partials.validation_errors')

    <h5>Add new Project</h5>
    <a href="{{route('admin.projects.create')}}"><i class="fa-solid fa-plus fa-2x"></i></a>

    <table class="table table-striped m-0 py-5">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Preview image</th>
                <th scope="col">Github link</th>
                <th scope="col">View Project</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($projects as $project)
            <tr>
                <td scope="row">{{$project->id}}</td>
                <td scope="row">{{$project->title}}</td>
                <td>{{$project->slug}}</td>
                <td class="text-center">
                    <img class="img-fluid" style="height: 100px; width:160px; object-fit:cover;" src="{{asset('storage/'. $project->img_path)}}" alt="{{$project->title}}" loading="lazy">
                </td>
                <td scope="row" class="text-center">
                    @if ($project->github_repo)
                    <i class="fa-solid fa-circle-check" style="color: #0ef15a;"></i>
                    @else
                    <i class="fa-solid fa-circle-xmark" style="color: #f20707;"></i>
                    @endif
                </td>
                <td scope="row" class="text-center">
                    @if ($project->project_link)
                    <i class="fa-solid fa-circle-check" style="color: #0ef15a;"></i>
                    @else
                    <i class="fa-solid fa-circle-xmark" style="color: #f20707;"></i>
                    @endif
                </td>
                <td>
                    <a href="{{route('admin.projects.show', $project->slug)}}"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('admin.projects.edit', $project->slug)}}"><i class="fa-solid fa-pencil"></i></a>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalId-{{$project->id}}">
                        <i class="fa-solid fa-trash-can" style="color: #dc3545"></i>
                    </button>


                    <!-- Modal -->
                    <div class="modal fade" id="modalId-{{$project->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalTitleId">Delete "{{$project->title}}" project?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure to delete this project?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{route('admin.projects.destroy', $project)}}" method="post">
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

    <nav aria-label="Page navigation">
        <ul class="pagination    ">
            <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
@endsection