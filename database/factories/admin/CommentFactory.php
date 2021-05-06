<?php

namespace Database\Factories\admin;

use App\Models\admin\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'       => $this->faker->numberBetween(1,20),
            'ticket_id'     => $this->faker->numberBetween(1,20),
            'comment'       => $this->faker->text(150),
            'active'        => $this->faker->numberBetween(0,1),
        ];
    }
}
