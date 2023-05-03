<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $tables = [
            ['name' => 'Burger Joint',],
            ['name' => 'Pasta Place',],
            ['name' => 'Sushi Spot',],
            ['name' => 'Mexican Grill',],
            ['name' => 'Pizza Parlor',],
        ];

        foreach ($tables as $restaurant) {
            Table::create([
                'name' => $restaurant['name'],
            ]);
        }
    }
}
