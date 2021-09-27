<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_meta extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tb_meta' ;

    protected $guarded = ['id'];


    protected $fillable = array(
        'tb_order_id',
        'order_id', 
        'meta_id', 
        'meta_key',
        'meta_value',

    );


}
