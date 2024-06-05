<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeSales extends Model
{
    use HasFactory;

    protected $fillable = ['coffee_product_id', 'quantity', 'unit_cost', 'selling_price'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    
    public function product()
    {
        return $this->belongsTo(CoffeeProduct::class, 'coffee_product_id');
    }

    public function calculateSellingPrice()
    {

        if(!$this?->product){
            $profit = 0.25;
        }else{
            $profit = $this->product->profit_margin;
        }

        $this->selling_price = ($this->quantity*$this->unit_cost / (1 - $profit)) + 10;
        $this->save();
    }
}
