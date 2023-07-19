<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $projectsCount = Project::where('user_id', '=', Auth::id())->orderByDesc('id')->get()->count();
        return view('admin.dashboard', compact('projectsCount'));
    }
}
