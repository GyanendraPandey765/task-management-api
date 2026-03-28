<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
use App\Models\User;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'user_id'     => User::factory(), // auto create user if not passed
            'title'       => $this->faker->sentence(4),
            'description' => $this->faker->paragraph,
            'status'      => $this->faker->randomElement(Task::STATUSES),
            'due_date'    => $this->faker->dateTimeBetween('now', '+30 days'),
        ];
    }
}