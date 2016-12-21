<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    //

    use Searchable;

    protected $fillable = [

        'name', 'Unitprice', 'imagePath', 'imageName', 'PriceOneHundred'
    ];

    public function orders()
    {
        return $this->belongsTo('App\Order', 'idProdutos');
    }
}
