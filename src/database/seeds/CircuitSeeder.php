<?php

use App\Circuit;
use Illuminate\Database\Seeder;

class CircuitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $circuits = [
            [
                'name' => 'Australia',
                'imageName' => 'AU',
            ],
            [
                'name' => 'Bahrain',
                'imageName' => 'BA',
            ],
            [
                'name' => 'China',
                'imageName' => 'CH',
            ],
            [
                'name' => 'Azerbaijan',
                'imageName' => 'AZ',
            ],
            [
                'name' => 'Spain',
                'imageName' => 'SP',
            ],
            [
                'name' => 'Monaco',
                'imageName' => 'MO',
            ],
            [
                'name' => 'Canada',
                'imageName' => 'CA',
            ],
            [
                'name' => 'France',
                'imageName' => 'FR',
            ],
            [
                'name' => 'Austria',
                'imageName' => 'AS',
            ],
            [
                'name' => 'Great Britain',
                'imageName' => 'GB',
            ],
            [
                'name' => 'Germany',
                'imageName' => 'GE',
            ],
            [
                'name' => 'Hungary',
                'imageName' => 'HU',
            ],
            [
                'name' => 'Belgium',
                'imageName' => 'BE',
            ],
            [
                'name' => 'Italy',
                'imageName' => 'IT',
            ],
            [
                'name' => 'Singapore',
                'imageName' => 'SI',
            ],
            [
                'name' => 'Russia',
                'imageName' => 'RU',
            ],
            [
                'name' => 'Japan',
                'imageName' => 'JA',
            ],
            [
                'name' => 'Mexico',
                'imageName' => 'ME',
            ],
            [
                'name' => 'United States',
                'imageName' => 'US',
            ],
            [
                'name' => 'Brazil',
                'imageName' => 'BR',
            ],
            [
                'name' => 'Abu Dhabi',
                'imageName' => 'AD',
            ],
        ];

        foreach ($circuits as $circuit){
            Circuit::create([
                'name' => $circuit['name'],
                'imageName' => $circuit['imageName']
                ]);
        }
    }
}
