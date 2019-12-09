<?php

use App\Competition;
use Illuminate\Database\Seeder;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $competitions = [
            [
                "name" => "Formule 1",
                "slug" => "formule-1",
            ],
            [
                "name" => "Formule 2",
                "slug" => "formule-2",
            ],
            [
                "name" => "Formule 3",
                "slug" => "formule-3",
            ],
            [
                "name" => "DTM",
                "slug" => "dtm",
            ],
            [
                "name" => "Nascar",
                "slug" => "nascar",
            ],
            [
                "name" => "Indycar",
                "slug" => "indycar",
            ]
        ];

        foreach ($competitions as $competition) {
            Competition::create([
                'name' => $competition['name'],
                'slug' => $competition['slug']
            ]);
        }
    }
}
