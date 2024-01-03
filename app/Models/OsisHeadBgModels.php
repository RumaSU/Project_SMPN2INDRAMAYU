<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OsisHeadBgModels extends Model
{
    use HasFactory;
    protected $table="page_osis_head_bg";
    protected $casts = [
        'page_osis_id' => 'string',
    ];
    protected $fillable=["page_osis_id", "page_head_img"];
}
