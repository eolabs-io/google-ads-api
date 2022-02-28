<?php

namespace EolabsIo\GoogleAdsApi\Domain\Shared\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

abstract class GoogleAdsApiMigration extends Migration
{
    /**
     * The database schema.
     *
     * @var \Illuminate\Database\Schema\Builder
     */
    protected $schema;

    /**
     * Create a new migration instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->schema = Schema::connection($this->getConnection());
    }

    /**
     * Get the migration connection name.
     *
     * @return string|null
     */
    public function getConnection()
    {
        return config('google-ads-api.database.connection');
    }
}
