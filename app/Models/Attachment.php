<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['post_id', 'filename'];

    public function product()
    {
        return $this->belongsTo(Post::class);
    }


}
