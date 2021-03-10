<?php

namespace Database\Factories;

use App\Models\Resume;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResumeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resume::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'office' => $this->faker->word(),
            'schooling' => $this->faker->randomDigitNotNull(),
            'note' => $this->faker->paragraph(),
            'file' => $this->faker->file('pdf', 'site', false)
        ];
    }
}
