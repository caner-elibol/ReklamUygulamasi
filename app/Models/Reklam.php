<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reklam extends Model
{
    use HasFactory;

    protected $table = "reklamlar";

    protected $fillable=['baslik','aciklama','maliyet','siteurl','gunluk_limit','user_id','maliyet','durum'];
}
