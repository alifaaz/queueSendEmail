<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cat;
use App\Models\Post;


use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Cat::truncate();
        User::truncate();
        Post::truncate();
       // $user =  User::factory()->create();
        for ($i=0; $i < 3; $i++) { 
            # code...
            $user =  User::factory()->create();
            $cat =  Cat::factory()->create();
            Post::factory(5)->create([
                'user_id'=> $user->id,
                'Cat_id' => $cat->id
            ]); 
        }
       
    }
}
