<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'Admin',
            'email' => 'admin@upnormal.com',
            'password' => bcrypt('admin@upnormal.com'),
            'role' => 'admin',
            'slug' => Str::random(25),
        ]);
    }
}