<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use EolabsIo\GoogleAdsApi\Domain\Shared\Migrations\GoogleAdsApiMigration;

return new class extends GoogleAdsApiMigration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('google_cost_insights', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id');
            $table->bigInteger('campaign_id');
            $table->bigInteger('ad_group_id');
            $table->bigInteger('ad_group_criterion_id');
            $table->date('date');
            $table->bigInteger('impressions');
            $table->bigInteger('clicks');
            $table->float('cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('google_cost_insights');
    }
};
