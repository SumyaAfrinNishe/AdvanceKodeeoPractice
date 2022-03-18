<?php

namespace App\Models;
use App\Models\Cloth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cloth extends Model
{
    use HasFactory;
    protected $table="cloths";
    protected $guarded=[];
   
}
