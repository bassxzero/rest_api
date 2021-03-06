<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';
    protected $fillable = ['price'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
