<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use App\Models\Tecnology;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('user_id', '=', Auth::id())->orderByDesc('id')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $tecnologies = Tecnology::all();

        return view('admin.projects.create', compact('types', 'tecnologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();

        $slug = Project::generateSlug($val_data['title']);

        $val_data['slug'] = $slug;
        $val_data['user_id'] = Auth::id();

        if ($request->hasFile('img_path')) {
            $img_path = Storage::put('uploads', $request->img_path);

            //dd($img_path); -> //"uploads/FRs2m4iOVqQ4jxUAa2wSPNuJ66Oqr1cSAAg9UiPH.png"

            $val_data['img_path'] = $img_path;
        }

        $new_project = Project::create($val_data);

        if ($request->has('tecnologies')) {
            $new_project->tecnologies()->attach($request->tecnologies);
        }

        return to_route('admin.projects.index')->with('message', 'Project added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {

        if (Auth::id() === $project->user_id) {

            $types = Type::all();
            $tecnologies = Tecnology::all();

            return view('admin.projects.edit', compact('project', 'types', 'tecnologies'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();

        $slug = Project::generateSlug($val_data['title']);

        $val_data['slug'] = $slug;

        if ($request->hasFile('img_path')) {

            //elimino la precedente immagine
            if ($project->img_path) {
                Storage::delete($project->img_path);
            }

            //aggiungo la nuova
            $img_path = Storage::put('uploads', $request->img_path);

            $val_data['img_path'] = $img_path;
        }

        $project->update($val_data);

        if ($request->has('tecnologies')) {
            $project->tecnologies()->sync($request->tecnologies);
        }

        return to_route('admin.projects.index')->with('message', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // quando elimino il progetto elimino prima anche l'immagine
        if ($project->img_path) {
            Storage::delete($project->img_path);
        }

        $project->delete();
        return to_route('admin.projects.index')->with('message', 'project deleted successfully');
    }
}
