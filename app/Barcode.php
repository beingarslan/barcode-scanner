<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    protected $filable = [
        'id',
        'value',
        'created_at',
        'updated_at'
    ];
}
