<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_product_order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tb_product_order' ;

    protected $guarded = ['id'];


    protected $fillable = array(
        'order_id',
        'product_id',
        'product_name', 
        'quantity', 
        'variation_id',
        'sub_total',
        'total',
        'price',
        'sku',
        'product_parant',

    );


}
