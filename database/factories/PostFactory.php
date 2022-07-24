<?php

namespace Database\Factories;

use App\Models\Cat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'title'=>$this->faker->sentence,
                'body'=> "<p>".$this->faker->paragraph."</p>",
                'exerpt'=>$this->faker->sentence,
                'published_at'=>$this->faker->date("y-m-d H:i:s"),
                "user_id"=>User::factory(),
                'Cat_id'=>  Cat::factory(),
                
            ];
        
    }
}
