<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    public $timestamps = false; //updated_at 비활성화
    protected $table = 'comments';

    protected $fillable = [
        'product_id',
        'flow_num',
        'comments'
  ];

  public static function getAllComments()
    {
        return self::all();
    }

}
