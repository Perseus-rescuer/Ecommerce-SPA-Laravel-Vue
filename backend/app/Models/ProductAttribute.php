<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductAttribute extends Model {
    use HasFactory;

    public $timestamps = false;

    public function product(): HasMany {
        return $this->hasMany(Product::class);
    }

    public function attribute(): HasMany {
        return $this->hasMany(Attribute::class);
    }
}
