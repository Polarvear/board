<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    // protected $table = 'jobs';

    // public static function getData() {
    //     return self::all();
    // }
    protected $fillable = [
        'product_id',
        'member_id',
        'content'
  ];
}
