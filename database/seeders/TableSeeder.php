<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->insert([
            'id' => '1',
            'name' => 'Table 1',
            'capacity' => 4,
            'slug' => Str::random(25),
			'code' => Str::random(5),
        ]);
        DB::table('tables')->insert([
            'id' => '2',
            'name' => 'Table 2',
            'capacity' => 4,
            'slug' => Str::random(25),
			'code' => Str::random(5),
        ]);
        DB::table('tables')->insert([
            'id' => '3',
            'name' => 'Table 3',
            'capacity' => 4,
            'slug' => Str::random(25),
			'code' => Str::random(5),
        ]);
        DB::table('tables')->insert([
            'id' => '4',
            'name' => 'Table 4',
            'capacity' => 4,
            'slug' => Str::random(25),
			'code' => Str::random(5),
        ]);
        DB::table('tables')->insert([
            'id' => '5',
            'name' => 'Table 5',
            'capacity' => 4,
            'slug' => Str::random(25),
			'code' => Str::random(5),
        ]);
        DB::table('tables')->insert([
            'id' => '6',
            'name' => 'Table 6',
            'capacity' => 4,
            'slug' => Str::random(25),
			'code' => Str::random(5),
        ]);
        DB::table('tables')->insert([
            'id' => '7',
            'name' => 'Table 7',
            'capacity' => 4,
            'slug' => Str::random(25),
			'code' => Str::random(5),
        ]);
        DB::table('tables')->insert([
            'id' => '8',
            'name' => 'Table 8',
            'capacity' => 4,
            'slug' => Str::random(25),
			'code' => Str::random(5),
        ]);
        DB::table('tables')->insert([
            'id' => '9',
            'name' => 'Table 9',
            'capacity' => 4,
            'slug' => Str::random(25),
			'code' => Str::random(5),
        ]);
        DB::table('tables')->insert([
            'id' => '10',
            'name' => 'Table 10',
            'capacity' => 4,
            'slug' => Str::random(25),
			'code' => Str::random(5),
        ]);
    }
}