<?
namespace App\Classes;

class Product{
    public  $name;
    public $price;

    function show(){
     return "{$this->name}"."{$this->price}";
    }

}
?>