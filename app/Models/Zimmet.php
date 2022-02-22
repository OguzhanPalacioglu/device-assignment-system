<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zimmet extends Model
{
    use HasFactory;
    protected $fillable=['kisi_id'];
    protected $nullable=['kisi_id'];
}
