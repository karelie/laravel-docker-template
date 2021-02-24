<?php

namespace Database\Factories;

use App\Models\UserWork;
use App\Models\User;
use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserWorkFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this -> faker ->numberBetween(1, User::count()),
            'work_id' => $this -> faker ->numberBetween(1, Work::count()),
        ];
    }
}
