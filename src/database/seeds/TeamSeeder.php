<?php

use App\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            [
                'name' => 'Mercedes',
                'color' => '#00d3be'
            ],
            [
                'name' => 'Ferrari',
                'color' => '#dd0000'
            ],
            [
                'name' => 'Red Bull',
                'color' => '#2933fb'
            ],
            [
                'name' => 'Mclaren',
                'color' => '#ff8818'
            ],
            [
                'name' => 'Renault',
                'color' => '#fef738'
            ],
            [
                'name' => 'Toro Rosso',
                'color' => '#3985ff'
            ],
            [
                'name' => 'Racing Point',
                'color' => '#f07fbb'
            ],
            [
                'name' => 'Alfa Romeo',
                'color' => '#880005'
            ],
            [
                'name' => 'Haas',
                'color' => '#af8e46'
            ],
            [
                'name' => 'Williams',
                'color' => '#ffffff'
            ],
        ];

        foreach ($teams as $team){
            Team::create([
                'name' => $team['name'],
                'color' => $team['color'],
            ]);
        }
    }
}
