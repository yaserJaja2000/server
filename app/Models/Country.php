<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'icon'];

    public function articles(): HasMany
    {
        return $this->hasMany(Blog::class);
    }

    /**
     * Get all of the comments for the Country
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}
