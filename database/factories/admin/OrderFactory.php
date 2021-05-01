<?php

namespace Database\Factories\admin;

use App\Models\admin\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//            'order_number' => $this->faker->randomNumber(),
            'user_id' => $this->faker->numberBetween(1,20),
            'ticket_id' => $this->faker->numberBetween(1,20),
            'qty' => $this->faker->numberBetween(10,100),
            'admin_status' => $this->faker->randomElement(['لم يتم الدفع', 'تم الدفع', 'حالة الطلب']),
            'payment_method' => $this->faker->randomElement(['أونلاين', 'الدفع عند الاستلام']),
            'total' => $this->faker->numberBetween(150,999),
        ];
    }
}
