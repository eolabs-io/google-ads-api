<?php

namespace EolabsIo\GoogleAdsApi\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\Campaign;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<EolabsIo\GoogleAdsApi\Domain\Shared\Models\Campaign>
 */
class CampaignFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campaign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(4),
            'name' => $this->faker->text(),
        ];
    }
}
