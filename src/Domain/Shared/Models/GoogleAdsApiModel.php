<?php

namespace EolabsIo\GoogleAdsApi\Domain\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

abstract class GoogleAdsApiModel extends Model
{
    use HasFactory;

    /**
     * Get the current connection name for the model.
     *
     * @return string|null
     */
    public function getConnectionName()
    {
        return config('google-ads-api.database.connection') ?? $this->connection;
    }
}
