<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetaData extends Model
{
    protected $table = 'meta_data';
    protected $guarded = ['id'];
    protected $fillable = array(
        'tb_order_id',
        'order_id',
        'meta_id',
        'meta_key'
    );

    public function metaDataValues()
    {
        return $this->hasMany('App\MetaDataValues');
    }
}
