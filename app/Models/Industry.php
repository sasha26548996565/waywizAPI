<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Industry extends Model
{
    protected $fillable = [
        'name'
    ];

    public function places(): HasMany
    {
        return $this->hasMany(Place::class, 'industry_id', 'id');
    }
}
