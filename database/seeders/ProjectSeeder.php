<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = config('projects_db');

        foreach ($projects as $project) {
            $newproject = new Project();
            $newproject->title = $project['title'];
            $newproject->slug = Str::slug($project['title'], '-');
            $newproject->description = $project['description'];
            $newproject->img_path = $project['img_path'];
            $newproject->stack = $project['stack'];
            $newproject->save();
        }
    }
}
