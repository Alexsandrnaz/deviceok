<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;
class Advertising extends Model
{
    protected $fillable =['name','description','image','view_time','owner','created_at','updated_at'];
    use HasFactory;
}
