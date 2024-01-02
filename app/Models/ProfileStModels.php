<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileStModels extends Model
{
    use HasFactory;
    protected $table="page_profile_st";
    protected $primaryKey="id_prf_st";
    protected $fillable=["id_prf_st", "npsn", "wdth_sch", "page_profile_id"];
}
