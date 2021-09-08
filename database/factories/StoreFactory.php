<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        // Find possible user_ids
        $maxUserId = User::get()->count();

        return [
            'name' => $this->faker->company(),
            'user_id' => $this->faker->numberBetween(1, $maxUserId),
            'notes' => $this->faker->text(200),
        ];
    }
}
