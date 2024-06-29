<?php

namespace Database\Seeders;

use App\Models\Project;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// FAKER
use Faker\Generator as Faker;
// STR
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 5; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->sentence();
            $newProject->description = $faker->text(300);
            $newProject->slug = Str::slug($newProject->title);
            $newProject->save();
        }
    }
}
