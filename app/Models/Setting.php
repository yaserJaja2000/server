<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'country',
        'city',
        'phone',
        'facebook',
        'instagram',
        'whatsapp',
        'twitter',
        'telegram',
        'url_email',
        'googl_play',
        'app_store',
    ];
}
