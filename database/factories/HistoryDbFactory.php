<?php

namespace Database\Factories;

use App\Models\HistoryDb;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistoryDbFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HistoryDb::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->text,
             'event_date' => $this->faker->date,
             'status' => 'NEW'
        ];
    }
}
