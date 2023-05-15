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
            ['name' => 'Table-1',],
            ['name' => 'Table-2',],
            ['name' => 'Table-3',],
            ['name' => 'Table-4',],
            ['name' => 'Table-5',],
        ];

        foreach ($tables as $restaurant) {
            Table::create([
                'name' => $restaurant['name'],
            ]);
        }
    }
}
