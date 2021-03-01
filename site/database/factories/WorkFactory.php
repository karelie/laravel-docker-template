<?php

namespace Database\Factories;

use App\Models\work;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WorkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = work::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this -> faker ->sentence($nbWords = 4, $variableNbWords = true),
            'slug' => str_slug($this -> faker ->sentence($nbWords = 4, $variableNbWords = true), '-'),
            'status' => 'published',
            'cover' => 'image-' . $this -> faker ->numberBetween(1, 17) . '.jpg',
            'description' => $this -> faker ->realText(),
            'likes' => 0,
            'content' => json_encode(["key" => "value"]),        
        ];
    }
}
