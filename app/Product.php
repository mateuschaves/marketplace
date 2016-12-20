<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //


    protected $fillable = [

        'name', 'Unitprice', 'imagePath', 'imageName', 'PriceOneHundred'
    ];

    public function orders()
    {
        return $this->belongsTo('App\Order', 'idProdutos');
    }
}
