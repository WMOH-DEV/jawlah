<?php

namespace Database\Factories\admin;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\admin\Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'desc' => $this->faker->text(150),
        ];
    }
}
