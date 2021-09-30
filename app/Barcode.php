<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    protected $fillable = [
        'id',
        'barcode_value',
        'created_at',
        'updated_at'
    ];
}
