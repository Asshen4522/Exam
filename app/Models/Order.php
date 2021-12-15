<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'photo_start',
        'photo_start',
        'status_id',
    ];
    public $timestamps;

}
