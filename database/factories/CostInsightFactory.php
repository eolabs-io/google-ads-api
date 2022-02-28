<?php

namespace EolabsIo\GoogleAdsApi\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use EolabsIo\GoogleAdsApi\Domain\Reporting\Models\CostInsight;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<EolabsIo\GoogleAdsApi\Domain\Reporting\Models\CostInsight>
 */
class CostInsightFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CostInsight::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->randomNumber(4),
            'campaign_id' => $this->faker->randomNumber(4),
            'ad_group_id' => $this->faker->randomNumber(4),
            'ad_group_criterion_id' => $this->faker->randomNumber(4),
            'date' => $this->faker->date('Y-m-d'),
            'impressions' => $this->faker->randomNumber(),
            'clicks' => $this->faker->randomNumber(),
            'cost' => $this->faker->randomFloat(2),
        ];
    }
}
