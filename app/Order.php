<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [

       '', 'amount', 'idProdutos', 'price', 'idUsers', 'typeOrder', 'deliveryDate', 'status', 'name', 'phone', 'address'

    ];


    public function users()
    {
        return $this->belongsTo('App\User', 'idUsers');
    }

    public function products()
    {
        return $this->belongsTo('App\Product', 'idProdutos');
    }
}
