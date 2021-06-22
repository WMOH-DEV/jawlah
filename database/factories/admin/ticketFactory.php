<?php

namespace Database\Factories\admin;

use App\Models\admin\ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class ticketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->name(),
            'city_id' => $this->faker->numberBetween(1,20),
            'category_id' => $this->faker->numberBetween(1,20),
            'price' => $this->faker->numberBetween(200,900),
            'desc' => $this->faker->text(200),
            'information' => $this->faker->text(200),
            'qty' => $this->faker->numberBetween(10,100),
            'vat' => $this->faker->numberBetween(0,1),
            'special' => $this->faker->numberBetween(0,1),
            'food' => $this->faker->numberBetween(0,1),
            'photography' => $this->faker->numberBetween(0,1),
            'id_card' => $this->faker->numberBetween(0,1),
            'trans' => $this->faker->numberBetween(0,1),
            'guide' => $this->faker->numberBetween(0,1),
            'safety' => $this->faker->numberBetween(0,1),
            'user_id' => $this->faker->numberBetween(1,20),
            'date_party' => $this->faker->date(),
            'last_day' => $this->faker->date(),
            'hour_party' => $this->faker->time(),
        ];
    }
}
