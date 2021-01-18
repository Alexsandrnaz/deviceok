<?php

namespace App\Models;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =['code','description','name','category_id','image','price','created_at','updated_at','brand','youtubeCode','inshop_count'];

    public function category()
{
    return $this->belongsTo(Category::class);
}
public function getOrderTotalPrice(){
    if(!is_null($this->pivot)){
      return $this->pivot->count*$this->price;
    }
    else{
        return $this->price;
    }
}
public function scopeFilter(Builder $builder, QueryFilter $filters)
{
    return $filters->apply($builder);
}

    public function getCount(){ 
        if(!is_null($this->pivot)){
            return $this->pivot->count;
          }
          else{
              return $this->count;
          }

    }
}

