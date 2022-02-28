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
        Schema::create('google_campaigns', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('name');
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
        Schema::dropIfExists('google_campaigns');
    }
};
