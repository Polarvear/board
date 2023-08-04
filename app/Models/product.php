<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    protected $fillable = [
      'name', 'content', 'type', 'assets_sort', 'level', 'advisor',
      'flow_1',
      'flow_2',
      'flow_3',
      'flow_4',
      'flow_5',
      'flow_6',
      'flow_7',
      'flow_8',
      'flow_9',
      'flow_10',
      'flow_11',
      'flow_12',
      'flow_13',
      'flow_14',
      'flow_15',
      'flow_16',
      'flow_17',
      'flow_18',
      'flow_19',
      'flow_20',
      'flow_21',
      'flow_22'
  ];
}
