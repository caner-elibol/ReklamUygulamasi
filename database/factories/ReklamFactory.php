<?php

namespace Database\Factories;

use App\Models\Reklam;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReklamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reklam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'baslik' => $this->faker->sentence(rand(3,7)),
            'aciklama' => $this->faker->sentence(rand(5,10)),
            'siteurl' => "www.example.com",
            'maliyet' =>(rand(1,100)/10),
            'gunluk_limit' => rand(1,100),
            'user_id'=>rand(1,11),
        ];
    }
}
