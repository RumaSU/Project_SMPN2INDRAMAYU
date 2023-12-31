<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OsisModels extends Model
{
    use HasFactory;
    protected $table="page_osis";
    protected $casts = [
        'page_osis_id' => 'string',
    ];
    protected $primaryKey="page_osis_id";
    protected $fillable=["page_osis_id", "page_logo", "page_description", "page_strct_img"];
}
