<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cat;
use App\Models\Post;
use App\Models\WebSite;
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
        
        
      $user = User::factory()->create();
      $website = WebSite::factory()->create();
      $website->users()->attach(User::factory(10)->create());

      Post::factory()->create([
        "user_id" => $user->id,
        "web_site_id"=> $website->id
      ]);
    }
}
