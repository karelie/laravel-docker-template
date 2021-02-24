<?php

namespace Database\Seeders;

use App\Models\UserWork;
use Illuminate\Database\Seeder;

class UserWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserWork::factory()->count(300)->create();
    }
}
