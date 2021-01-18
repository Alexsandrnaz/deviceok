<?php

namespace App\Models;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->beLongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }
    public function getAllOrderTotalPrice(){
    $sum = 0;
    foreach($this->products as $product){
        $sum+= $product->getOrderTotalPrice();
    }
    return $sum;
    } 
public function user()
{
    return $this->beLongsTo(User::class);
}
    public function getTotalCount(){
        $sum =0;
        foreach($this->products as $product){
            $sum+=$product->getCount();
        }
        return $sum;
    }
}
 