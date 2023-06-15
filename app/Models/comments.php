<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable = [
        'product_id',
        'member_id',
        'content'
  ];

  public static function getAllComments()
    {
        return self::all();
    }

}
