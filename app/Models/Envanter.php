<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kisiler;

class Envanter extends Model
{
    use HasFactory;
    protected $nullable;
    protected $fillable=['urun_cesidi','urun_marka','urun_model','urun_ozellik','kisi_id','okul','seri_no'];

    public function kisiler(){
        return $this->belongsTo('App\Models\Kisiler','id');
    }
    
}
