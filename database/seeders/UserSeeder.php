<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();        
        User::create([
            'name' => 'dzimar',            
            'role_id' => 1,
            'email' => 'dzimar@gmail.com',
            'password' => Hash::make('tes12345'),            
        ]);
        User::create([
            'name' => 'permana',            
            'role_id' => 2,
            'email' => 'permana@gmail.com',
            'password' => Hash::make('tes12345'),            
        ]);
        // User::create([
        //     'name' => 'permana',
        //     'level' => 'admin',
        //     'email' => 'permana@gmail.com',
        //     'password' => Hash::make('tes12345'),            
        // ]);

        // User::create([
        //     'name' => 'dzimar',
        //     'email' => 'dzimar@gmail.com',
        //     'password' => Hash::make('tes12345'),
        //     'role_id' => 1,

        // ]);
    }
}
