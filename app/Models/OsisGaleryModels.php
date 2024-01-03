<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OsisGaleryModels extends Model
{
    use HasFactory;
    protected $table="page_osis_galery";
    protected $casts = [
        'page_osis_galery_id' => 'string',
    ];
    protected $fillable=[
        "page_osis_galery_id", 
        "title_galery", 
        "name_file", 
        "connect_pgos_gal_id", 
        "is_published",
    ];
}
