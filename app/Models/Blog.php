<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'url',
        'category',
        'country_id',
        'image',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
