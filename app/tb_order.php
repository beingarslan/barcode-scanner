<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tb_order' ;

    protected $guarded = ['id'];


    protected $fillable = array(
        'order_id',
       'status',
        'total', 
      
    );


}
