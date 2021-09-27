<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetaDataValue extends Model
{
    protected $table = 'meta_data_values';
    protected $guarded = ['id'];
    protected $fillable = array(
        'tb_meta_id',
        'meta_value_key',
        'meta_value_value'
    );

    public function metaData()
    {
        return $this->belongsTo('App\MetaData');
    }
}
