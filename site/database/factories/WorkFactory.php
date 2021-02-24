<?php

namespace Database\Factories;

use App\Models\work;
use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Illuminate\Support\Str;
=======
>>>>>>> afe9d47c2fe91d6a745d190b7d7229ef32ff4741

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
<<<<<<< HEAD
            'title' => $this -> faker ->sentence($nbWords = 4, $variableNbWords = true),
            'slug' => str_slug($this -> faker ->sentence($nbWords = 4, $variableNbWords = true), '-'),
            'status' => 'published',
            'cover' => 'image-' . $this -> faker ->numberBetween(1, 17) . '.jpg',
            'description' => $this -> faker ->realText(),
            'content' => json_encode(["key" => "value"]),        
=======
            //
>>>>>>> afe9d47c2fe91d6a745d190b7d7229ef32ff4741
        ];
    }
}
