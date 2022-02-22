<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Envanter;

class Kisiler extends Model
{
    use HasFactory;
    
    protected $fillable=['ad_soyad','kadro','birim_zumre'];

    public function envanter(){
        return $this->hasMany('App\Models\Envanter','kisi_id');
    }
}
