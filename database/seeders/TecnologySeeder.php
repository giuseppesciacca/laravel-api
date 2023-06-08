<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tecnology;
use Illuminate\Support\Str;

class TecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tecnologies = ['HTML5', 'CSS3', 'JavaScript', 'Vue.js', 'Vite', 'php', 'Laravel'];

        foreach ($tecnologies as $tecnology) {
            $newTecnology = new Tecnology;

            $newTecnology->name = $tecnology;
            $newTecnology->slug = Str::slug($newTecnology->name);
            $newTecnology->save();
        }
    }
}
