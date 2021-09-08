<?php

namespace Database\Factories;

use App\Models\Ingredient;
use App\Models\Store;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class IngredientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ingredient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Find possible user_ids
        $maxUserId = User::get()->count();
        $userId = $this->faker->numberBetween(1, $maxUserId);

        $proteins = $this->faker->randomDigit(1, 50);
        $carbs = $this->faker->randomDigit(1, 50);
        $fats = $this->faker->randomDigit(1, 50);

        $calories = ($carbs * 4) + ($proteins * 4) + ($fats * 9);

        return [
            'name' => $this->faker->colorName() . ' food',
            'user_id' => $userId,
            'store_id' => Store::factory()->create(['user_id' => $userId])->id,
            'cost' => $this->faker->randomFloat(2, 0.10, 100),
            'calories' => $calories,
            'proteins' => $proteins,
            'carbs' => $carbs,
            'fats' => $fats,
            'notes' => $this->faker->text(200),
            'last_used' => $this->faker->dateTimeBetween('-6 months', 'now')
        ];
    }
}
