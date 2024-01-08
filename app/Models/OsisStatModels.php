<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OsisStatModels extends Model
{
    use HasFactory;
    protected $table="page_osis_stat";
    protected $casts = [
        'page_osis_id' => 'string',
    ];
    protected $fillable=["page_osis_id", "osis_leader_id", "facebook", "instagram", "twitter", "tiktok", "youtube",];
}
