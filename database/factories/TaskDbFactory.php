<?php

namespace Database\Factories;

use App\Models\TaskDb;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskDbFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskDb::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
             'task' => $this->faker->text,
             'due_date' => $this->faker->datetime,
        ];
    }
}
