<?php

namespace EolabsIo\GoogleAdsApi\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use EolabsIo\GoogleAdsApi\Domain\Shared\Models\GoogleAdsApiAuthorization;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<EolabsIo\GoogleAdsApi\Domain\Shared\Models\GoogleAdsApiAuthorization>
 */
class GoogleAdsApiAuthorizationFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GoogleAdsApiAuthorization::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => "{$this->faker->sha1}.apps.googleusercontent.com",
            'refresh_token' => "G{$this->faker->sha256}",
        ];
    }
}
