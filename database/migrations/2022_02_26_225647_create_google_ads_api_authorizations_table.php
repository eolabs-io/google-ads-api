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
        Schema::create('google_ads_api_authorizations', function (Blueprint $table) {
            $table->id();
            $table->string('client_id')->unique();
            $table->text('refresh_token');
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
        Schema::dropIfExists('google_ads_api_authorizations');
    }
};
