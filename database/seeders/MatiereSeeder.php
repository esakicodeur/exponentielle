<?php

namespace Database\Seeders;

use App\Models\Matiere;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MatiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matieres = collect(['Mathematiques', 'Physiques', 'Chimie', 'Informatique']);

        $matieres->each(fn ($matiere) => Matiere::create([
            'name' => $matiere,
            'slug' => Str::slug($matiere),
        ]));
    }
}
