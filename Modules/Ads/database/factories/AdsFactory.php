<?php

namespace Modules\Ads\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Ads\Models\Ads::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

