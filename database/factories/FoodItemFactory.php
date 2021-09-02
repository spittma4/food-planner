<?php

namespace Database\Factories;

use App\Models\FoodItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FoodItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FoodItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Find possible user_ids
        $maxUserId = User::get()->count();

        $proteins = $this->faker->randomDigit(1, 50);
        $carbs = $this->faker->randomDigit(1, 50);
        $fats = $this->faker->randomDigit(1, 50);

        $calories = ($carbs * 3) + ($proteins * 4) + ($fats * 5);

        return [
            'name' => $this->faker->colorName() . ' food',
            'user_id' => $this->faker->randomDigit(0, $maxUserId),
            'calories' => $calories,
            'proteins' => $proteins,
            'carbs' => $carbs,
            'fats' => $fats,
            'notes' => $this->faker->text(200),
            'last_used' => $this->faker->dateTimeBetween('-6 months', 'now')
        ];
    }
}
